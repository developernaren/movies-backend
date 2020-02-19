## Movies App

This is a movie app written in Laravel. 

### Setup

1. Clone the repo.
1. Run `cp .env.example .env`
1. Run `php artisan key:generate`
1. Make sure the values in `.env` for database connection are correct.
1. Run `php artisan migrate --seed` // this will create the database and few records

### Setup with docker

**If you do not have docker installed in your system. [Refer here](https://docs.docker.com/install/)**  
There is docker compose file provided in the repo which has all the necessary steps to build and run a docker container to host the app.  
You can access the site at `http://localhost` or you can create a virtual host to point to `127.0.0.1` and access as a domain  
The docker-compose also has a mysql server with credentials. You can use these credentials in your `.env` file to connect to the database.
```dotenv
 DB_CONNECTION=mysql
 DB_HOST=mysql5.7
 DB_PORT=3306
 DB_DATABASE=laravel
 DB_USERNAME=root
 DB_PASSWORD=root
```

#### Steps
1. Clone the repo.
1. Run `docker-compose up` form the root of the project.
1. Run `docker exec -i mauqah php artisan key:generate`
1. Make sure the values in the `.env` are as mentioned above.
1. Run `docker exec -i mauqah php artisan migrate --seed`
1. You can browse the application at `http://localhost`

### Cs Fixer

This project uses [PHP CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to format the code and comply with [PSR-2](https://www.php-fig.org/psr/psr-2/). To run this on `pre-commit` hook.  
Run `./hook.sh` to copy the file from `hooks/pre-commit` to `.git/hooks/pre-commit`

### Features

1. `/` redirects to `/films`
1. See a list of movies at `/films`
    1. Click the `Detail` button to see the detail of the movie
    1. Navigate the pagination links
1. Click the detail `Go To Listing` button to go back to listing.
1. Go to `/films/#/films/create` to create a film.

### Architecture

#### Backend
This project tries to be framework agnostic in it's core business logic. All the code for the app is written inside `src/` folder.  

I have separated the module `Films` to house all the logic for `films`  
Controllers are inside `Films\Actions`. I make use of [Single Action Controllers](https://laravel.com/docs/5.8/controllers#single-action-controllers).
This projects uses `Repository Pattern` to separate database logic from the actual `Entity` of the project.  
Eloquent Models and Lower implementation of entities are not exposed anywhere outside of the `Entities` of the project. All of the entities have their own `Interfaces` so that they can be swapped later if need be.  
All of the entities have their own `Tranformers` as well. Transformers are used to filter out or add the parts of the api we want to expose. It creates a layer between Entity and Api which makes manipulating Entity output for an API very easy.  
I have created my own implementation of `Paginator` to separate Eloquent from the api. The `ApiResponse` combines the `Entities`, `Transformera` and `Paginator` to create appropriate response.  
I have also created a `Service` folder to house my services. This can be assumed as a `Command` in a typical `CommandBus` pattern. This holds all the data necessary to do the intended action. This object is immutable.  
I like my objects to be immutable. Once created they do not change state. There are no setters in my classes.

#### Frontend

The frontend of the application is written in VueJs. 

### Tests

I have added unit tests and feature tests for the application. Feature tests use `sqlite` driver for database connection.
You can run tests by running `./vendor/bin/phpunit` from the root of the project

### Github Action

There is a github action that run the test on every push to the repo.
