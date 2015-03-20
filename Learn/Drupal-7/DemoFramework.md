```bash
service nginx stop; service php5-fpm stop; service memcached stop

drush si -vy df
drush reset-scenario dfs_wem
drush uli

service nginx start; service php5-fpm start; service memcached start
```
