### Run a PHP script as service

daemon \
    --chdir=/var/www/tools \
    --command /srv/bin/php \
    -S 127.0.0.1:8000 \
    --respawn \
    --output=/var/log/tools/tools.log \
    --name=tools \
    --verbose

### Run HHVM

    /usr/bin/hhvm \
      --config /home/vc.web/.drush/php.ini \
      --config /opt/hhvm/server.vc.ini \
      --user vc.web \
      --mode daemon \
      -vPidFile=/var/run/hhvm/vc/hhvm.pid
