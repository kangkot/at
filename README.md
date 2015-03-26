```ini
; Config for dev
error_reporting = E_ALL
display_errors = On
html_errors = On
display_startup_errors = On
log_errors = On
```

### Override default settings on run PHP CLI

    php -d memory_limit=1024M my_script.php

### Install CLI apps

    # Add this line to ~/.bash_profile
    export PATH="$HOME/.composer/vendor/bin:$PATH"

    # Composer
    curl -sS https://getcomposer.org/installer | php
    chmod a+x composer.phar
    mv composer.phar /usr/local/bin/composer
    
    # Drush
    composer global require drush/drush:~7.0.0-alpha1
    
    # Install PHPUnit
    composer global require phpunit/phpunit=~4.5.0

## [Barracuda](https://github.com/omega8cc/boa)

    cd;wget -q -U iCab http://files.aegir.cc/BOA.sh.txt;bash BOA.sh.txt
    
    # Update
    barracuda up-stable

## Misc

### [PHP Annotation](https://github.com/php-annotations/php-annotations)

```php

/**
 * @method        getX() getX(string $param1, $int $param2)
 * @method static getY() getY()
 * @method {type} {func(type arg, type arg, ...)} {description} : defines a magic/virtual method
 */
class Foo {}
```

## xDebug

### Proxying/Tunneling Your Debugger Connection

    ssh -R 9000:localhost:9000 some_user_account@www.example.com

### php.ini

    zend_extension=xdebug.so
    xdebug.idekey=PHPSTORM
    xdebug.remote_handler=dbgp
    xdebug.remote_host=localhost
    xdebug.remote_enable=1
    xdebug.remote_log=/var/log/php5-xdebug.log
