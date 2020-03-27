# GMRQueue

GMRQueue is a Laravel 7 project that consist of a web-api server (REST API) that schedules jobs on the queue package of laravel, it also allows you to monitor the status of the jobs by the horizon web panel, this project uses laravel authentication and laravel passport to register/login users so they could get a session token to access the rest of the endpoints, this way it would exist a record of which user is scheduling the jobs.

Some of the laravel packages used in this project are:

  - Laravel Passport [https://laravel.com/docs/7.x/passport]
  - Laravel Horizon [https://laravel.com/docs/7.x/horizon]
  - Laravel Queue [https://laravel.com/docs/5.8/queues]

## Pre-requisites:

  - PHP >= 7.2.5
  - Redis >= 4.0.x
  - MySQL 5.7.x

All the server requirements of a laravel application are also required to execute this project (composer, extensions, etc), you can find more information on the official website [https://laravel.com/docs/7.x].

## Installation

    $ git clone https://github.com/earoot/GMRQueue.git
    $ cd GMRQueue/

Create .env file from .env.example and fill the database and redis information, also verify that the QUEUE_CONNECTION is set to redis.

RUN THE FOLLOWING COMMANDS TO CONFIGURE AND FINISH INSTALLATION:

    $ composer install
    $ php artisan key:generate
    $ php artisan passport:install
    $ php artisan config:cache
    $ chmod -R 777 storage/
    $ chmod -R 777 bootstrap/cache

## RUN SERVER (LOCALLY)

Open the terminal and go to the project folder (you may need to open several tabs), then you would need to run the following commands (each per tabs/window):

    $ php artisan serve
    $ php artisan horizon
    $ php artisan queue:work --queue=high,low

## API Documentation and Testing Environment

 - Testing environment API prefix: http://3.90.154.57/api/v1/
 - Horizon for testing: http://3.90.154.57/horizon
 - API Docs: http://3.90.154.57/api-info

 ### Bash Script for testing:

Another option for testing the queue is to execute the bash script contain into utils folder (executeQueue.sh), there are some arguments such as -e (email), -p (password), -q (quantity of jobs) and -t (priority of the jobs), this script is using the base url=http://3.90.154.57, in case you would want to test locally just need to change the base URL to point to your local url.

    $ bash executeQueue.sh -e mail@test.cl -p 123456 -q 2 -t high

### Aditional Information:
 - In the utils folder you would find a postman collection (GMRqueue_postman_collection.json) with all the endpoints related to this project, you can import it into your postman account and replace the parameters.

 - If you are looking to run this project on a server, you may need to install supervisor [http://supervisord.org/]
