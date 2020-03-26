# GMRQueue

GMRQueue is a Laravel 7 project that consist of a web-api server (REST API) that schedules jobs on the queue package of laravel, it also allows you to monitor the status of the jobs by the horizon web panel, this project uses laravel authentication and laravel passport to register/login users so they could get a session token to access the rest of the endpoints, this way it would exist a record of which user is scheduling the jobs.

Some of the laravel packages used in this project are:

  - Laravel Passport [https://laravel.com/docs/7.x/passport]
  - Laravel Horizon [https://laravel.com/docs/7.x/horizon]
  - Laravel Queue [https://laravel.com/docs/5.8/queues]

# Pre-requisites:

  - PHP >= 7.2.5
  - Redis >= 4.0.x
  - MySQL 5.7.x

All the server requirements of a laravel application are also required to execute this project (composer, extensions, etc), you can find more information on the official website [https://laravel.com/docs/7.x].
