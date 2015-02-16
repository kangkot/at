Import gzipped DB dump but ignore data from specific tables

    gunzip -c db.sql.gz \
        | grep -Ev "^INSERT INTO \`(cache_|search_|sessions|whatever)" \
        | mysql -u root -p databasename;
        
    # DRUPAL VERSION
    gunzip -c db.sql.gz \
        | grep -Ev "^INSERT INTO \`(cache_|search_|sessions|whatever)" \
        | drush sqlc
