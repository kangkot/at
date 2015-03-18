I presented this topic at PHP Saigon UG, March 2015.

The full presentation can be found [here](http://slides.com/andytruong/sf2-console#/2/5).

### 1. Require the library

```json
{
  "require": {
    "symfony/console": "2.6.4"
  }
}
```

### 2. Front controller

```php
<?php

/** @file cli.php */

require_once __DIR__ . '/vendor/autoload.php';
$app = new Symfony\Component\Console\Application('AT console talk', '0.1.0');
$app->add(new HelloCommand());
$app->run();
```

### 3. Define command class

```php
<?php

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Symfony\Component\Console\Command\Command
{
    public function configure()
    {
        $this
            ->setName('at:demo:hello')
            ->setDescription('Just say Hello to all the world!')
            ->addArgument('name', InputArgument::OPTIONAL)
            ->addOption('language', 
                $shortcut = null, 
                InputOption::VALUE_OPTIONAL, 
                'Language to speak.', 'en'
            );
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name') ?: 'world!';

        switch ($input->getOption('language')) {
            case 'vi':
                $output->writeln("Chào {$name}!");
                break;
            case 'en':
            default:
                $output->writeln("Hello {$name}!");
                break;
        }
    }
}
```

### 4. Run the command

```bash
php cli at:demo:hello # Output: Hello world!
!! "Andy"             # Output: Hello Andy
!! --language=vi      # Output: Chào Andy
```
