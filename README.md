# d-script 


## About 

This app is used to generate the deploy scripts for servers allowing for zero downtime deployments.

It simply generates the bash commands to:
* Add the relevant ssh key
* Clone the latest commit into the projects releases folder
* Create the symbolic links for any persistent files e.g. .env & storage
* Run any pre-activation scripts
* Activate the release


## Project Setup

### Install dependencies
* `composer install`
* `yarn`
* `yarn dev`

### Set up .env
* `cp .env.example .env`
* `php artisan key:generate`

### Migrations
* `php artisan migrate`