Research for "Drupal starter" project
====

## Goals

Proposed a structure that can be used for all Drupal websites, which includes:

1. Drupal make files (extendable, easy monitor)
- Able to store custom modules, themes and libraries
- Able to store acceptance test cases.
- Able to store specifications.
- Able to store documentation for the specific website project.
- Deployment script should be provided, runnable by popular Continue Integration systems (Jenksins, CodeShip, CircleCI, …)

## Proposed structure

The implementation can be found at redcms/redcms.

```
/design               ; (1) Designs for the website
/docs                 ; (2) Documentations
/drupal-site/         ; (3) Things for Drupal
  /drupal.make        ; (4) Make file for website.
  /libraries/         ; (5, 6, 7) Custom modules/themes/libraries for 
  /modules/           ;           specific Drupal website.
  /themes/            ;
  /local.settings.php ; (8) Settings for Drupal site (Mollom keys, …)
/licenses/            ; (9) Licenses files for the website.
/testss/              ; (10 Front end test scripts
/Deploy.bash          ; (10) Deployment script
/README.md            ; (11) Quick notes for the project.
```

### Review CI systems

**Competitors:** TravisCI, CircleCI, CodeShip

Reason we picked products for reviewing:

1. Popularity
- Easy to use
- Flexible (support PHP/Drupal/cloud infrastructures)
- Support private repositories
- Good documentation
- Out of box supporting for Github/Bitbucket

| Aspect                               	| Travis CI 	| Circle CI 	| CodeShip 	|
|--------------------------------------	|-----------	|-----------	|----------	|
| Support PHP                          	| Yes       	| Yes       	| Yes      	|
| Install custom software on deploying 	| Yes       	| Yes       	| Yes      	|
| Testing                              	| Yes       	| Yes       	| Yes      	|
| Deployment                           	| Yes       	| Yes       	| Yes      	|
| Popular paid package                 	| $129      	| $50       	| $50      	|
| Notifications                        	| Yes       	| Yes       	| Yes      	|
| Popularity (http://j.mp/1ET11Pn)     	| #1        	| #3        	| #2       	|

### Picked solution

Winner: CodeShip. Reasons:

We don't select because it much more expensive then two other competitors
There is no clear winner between CircleCI and CodeShip. Personal feeling, CodeShip is more friendly.
We can swap to other solution if CodeShip has issue a long the way we use it.

## Explained workflows

Deploy script in action can be found here.

1. Make the source code
- Sync made source code to destination
- Sync custom themes/modules/libraries to destination
- If there's a running Drupal instance
  - `drush vset maintenance_mode 1 # Put the site to maintainance mode`
  - `drush rr                      # registry rebuilt`
  - `drush -y updb                 # update dabase schema`
  - `drush composer-rebuild        # Rebuild composer.json file`
  - `drush -y fra                  # revert features`
  - `drush vset maintenance_mode 0 # Put the site online`
- Update composer

## Link

- https://github.com/atdrupal/make
