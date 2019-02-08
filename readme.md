
# Short URL SPA/Laravel BACKEND

This project is built with the React library to create SPA in order to consume an API made with Laravel.

The application implements a record and implementation of shortened urls in order to be able to manage these urls in order to share them with their friends and to be able to keep them.

## DEMO 

I share a link so you can visualize the project before its installation
LINK: https://drive.google.com/file/d/1wxiJifZ1ji241JhFLV_dHbqaUgC3NdT3/view

## Install Composer

You need to have the composer package manager installed, if you have it installed, skip this step

### `composer install`


## Create a new key

For security measures each Laravel project has a unique key that is created in the .env file when the project starts.

### `php artisan key:generate`


## Database and migrations

In general, the databases in Laravel projects are created using migrations.

### `mysql -uroot -psecret`
### `mysql> CREATE DATABASE your_DB;`

Then you must add the credentials to the .env file

DB_HOST=localhost
DB_DATABASE=your_DB
DB_USERNAME=your_USER
DB_PASSWORD=your_PASSWORD

Finally you will be able to execute the migration from the console using artisan


### `php artisan migrate`

## Start Server

All that remains is to start the Laravel server

### `php artisan serve`


## Approach of the Backend with Larevel

The method with which I have used React is dividing the tasks of the components to perform tasks. The components that have process logic are called 'container' based on the intelligent components. While the dumb components are in charge of just showing the interfaces and displaying data.

The URL shortener has been done in a random way by limiting the number of characters by means of a php function called '' base_convert ", it returns a string containing the number given by number represented in base to base. given number is specified in frombase, both frombase and tobase must be values between 2 and 36. Digits in numbers with a base greater than 10 will be represented by the letters az, where a means 10, b means 11, and z means 35. It does not matter if the letters are uppercase or lowercase: number will be interpreted correctly.

Finally, the most popular websites have been researched, the data source is: = LINK https://moz.com/top500.

This contains a csv file with all the records, through the controllers those records are read and stored in the database to be consumed by the FRONTEND.