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

### Install composer

    curl -sS https://getcomposer.org/installer | php
    chmod a+x composer.phar
    mv composer.phar /usr/local/bin/composer


### Install Drush

    export PATH="$HOME/.composer/vendor/bin:$PATH"
    composer global require drush/drush:~7.0.0-alpha1

## [Barracuda](https://github.com/omega8cc/boa)

    cd;wget -q -U iCab http://files.aegir.cc/BOA.sh.txt;bash BOA.sh.txt

### Update

    barracuda up-stable
