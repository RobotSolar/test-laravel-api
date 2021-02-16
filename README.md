
### Installation

Install the dependencies, seed your database and start the server, do not forget connect your database in your .env file.

```sh
$ composer install
$ cd thisAwesoneProject
$ php artisan migrate --seed
$ php artisan serve
```


### Usage

| Method  | URI  |  description |
| ------------ | ------------ | ------------ |
|  GET / HEAD  | api/v1/movies   | Get List movies  |
|POST   |api/v1/movies   |  Create movie  |
|  GET / HEAD  |api/v1/movies/{id-movie}   |  Get a movie  |
| PUT / PATCH  | api/v1/movies/{id-movie}  | Update a movie  |
| DELETE  |api/v1/movies/{id-movie}   |   Delete a movie| |


 
