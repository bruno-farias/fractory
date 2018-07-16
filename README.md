# fractory

### Requirements
- Docker

### Instructions to install
1. Clone this repo on your machine `git clone git@github.com:bruno-farias/fractory.git`
2. Go to the folder laradock and run the following commands:
    1. `git submodule init`
    2. `git submodule update`
    3. `cp env-example .env`
    4. `docker-compose up -d nginx workspace` this gonna take a while, we are pulling the images that we need to run the project
    5. `docker-compose exec --user=laradock workspace bash` here we can run commands on project e.g php artisan, composer...
3. Setup .env file
4. on workspace (2.5) run `composer install`
5. on workspace (2.5) run `php artisan storage:link`
