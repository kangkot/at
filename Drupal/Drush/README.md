### Run test cases

```bash
$ # Run group of test cases
$ drush test-run --dirty --field-labels=0 'Quiz'
$ # Run specific test case
$ drush test-run 'Drupal\scale\Tests\ScaleTestCase'
```

### Archive Dump

```php
$dir = DRUPAL_ROOT . '/' . conf_path();
exec('cd '. $dir .'; drush ard -v --destination='. $dir .'/files/dump.tar', $output);
exec('gzip -9 '. $dir .'/files/dump.tar', $output);
exec('ls -lah '. $dir .'/files/*.gz', $output);
print_r($output);
```

### Database Dump

```php
global $databases;
$db = $databases['default']['default'];
$files = DRUPAL_ROOT . '/' . conf_path() . '/files/';
 
exec('rm -rf '. $files .'/db.sql', $output);
exec('rm -rf '. $files .'/db.sql.gz', $output);
exec("mysqldump -u{$db['username']} -p{$db['password']} -h{$db['host']} {$db['database']} > {$files}/db.sql", $output);
exec('gzip -9 '. $files .'/db.sql', $output);
exec('ls -lah '. $files .'/db.*', $output);
```

### Others

Run built-in server with no logging

    drush --quiet --yes runserver localhost:8888 > /dev/null 2>&1 &
