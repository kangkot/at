Create build file

```bash
$ mkdir -p .openshift/action_hooks
$ vim .openshift/action_hooks/build
```

With content:

```bash
# Make sure the files directory is available
if [ ! -d "$OPENSHIFT_DATA_DIR/drupal-files" ]; then
    mkdir $OPENSHIFT_DATA_DIR/drupal-files
fi
ln -s $OPENSHIFT_DATA_DIR/drupal-files $OPENSHIFT_REPO_DIR/sites/default/files

# Rebuild registery, flush cache
drush registry-rebuild
drush cc all

# Call composer update script
drush composer-json-rebuild
drush composer-manager update --no-dev
```
