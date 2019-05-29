A Book Shop in PHP.
===================

The "mybookshop" project implements all the functionalities that are requested in the scope of the PHP challenge:

- A user can register/un-register to the platform.
- A user can access their personal data and update their details (no authentication required).
- A user can list all books currently available in the store.
- A user can purchase books from the store.
- A user can access his purchase history.

I have tried to follow the instructions:

- In the Design of the application there is a consideration of the scale or eject of domains. For example, the domain "payment methods" has been implemented but it has not been completed for reasons of time. For the complete inclusion of this domain you can fully follow the implementation of the domain "(shipping) addresses" that has been made complete. I have decided not to remove the implemented parts of "payment methods" so as not to lose that code. But if a related link is used it will produce "404. Not Found" ...

- I have developed this project using the Laravel framework, being the first time I use this framework. I have learned it for the challenge. In fact, some time ago I have not developed anything in PHP.

- MySQL is also used as a database.

However for reasons of time I have not been able to include logs or tests. If necessary, I can include it with time.

Some notes on the design:

I have separated the WEB controllers and the API controllers to make the project decoupled in "APIs" and "Web Portal" very easily. The controllers using the middleware "WEB" have the namespace App\Http\Controllers and the controllers using the middleware "API" have the namespace App\Http\Controller\Api.

The project could be deployed in two different locations. Using only the functionality of "APIs" in one location and in the other only using the functionality of "Web Portal".

There are 3 APIs currently implemented: Books, Shipping Addresses and Orders.

To consume API I have included 3 classes (one for each API), under the "Repositories" directory. These classes are used by WEB controllers

I have included a very simple type of authentication using api_token. You have to register the user to be able to access the private parts of the application as well as to use the Addresses API and Orders API. The Books API, which only implements read-only operations at this moment, could be accessed publicly.

INSTALLATION:
============

IMPORTANT NOTE: I have used GuzzleHttp as a client to call the APIs. By using the development server included with Laravel for both the APIs and the WEB I have had fatal problems with calls to the APIs. The requests were blocked.

So I have installed NGINX for development. This option is necesssary to explore the project.

For the installation of NGINX and project deployment I followed the instructions of https://uavlabs.org/2018/05/14/desplegando-laravel-sobre-gnu-linux/. Basically I did standard installation of nginx listening in por 8080. Then I made the project folder "mybookstore" the Document Root of the nginx server

The steps of installation of the project are the following:

1. git clone https://github.com/damor4321/mybookshop.git

2. cd mybookshop

3. composer install

4. Install MySQL as always and create the "bookshop" DB and the user that appears in the file mybookshop/.env file

5. php artisan migrate

6. To populate the "books" table and the "addresses" table with some rows to use the project, execute:

- php artisan db:seed --class=BooksTableSeeder
- php artisan db:seed --class=AddressesTableSeeder

7. start the server: run NGINX listening in 8080  (don't try php artisan serve bcs it doesn't work)

Please, at this time it is necessary to use port 8080. Due to lack of time the URLs of the APIs are hardcoded in 127.0.0.1:8080. I'll get it out to setup as soon as I can ...

Then you haver to visit 127.0.0.1:8080 an you have to register at least one user of the bookstore in the "Register" link.

At this point you can already search books, manage shipping addresses, make purchases and view your purchase history.

