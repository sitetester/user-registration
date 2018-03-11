# Project description
Using the Symfony framework, write an application that allows you to sign up, log in, change your account information when you are online and log out
### Registration form fields, field validation:
* Name (not empty);
* Last name (not empty);
* Country (let us choose from at least 20 countries / Selected);
* City (depending on the country, the amount is irrelevant / Selected / Valid for chosen country);
* Email address (not empty / Validated);
* Password (more than 8 characters).
### Connection form fields, field validation:
* Email address (not empty / Validated)
* Password (more than 8 characters)

To change your account information use the registration form and validation.

### Login / Logout:
* Save the date of login and logout actions;
* A Table with date and steps (login / logout) columns.

# Project setup

## Required setup/environment:
* PHP 7.2
* Symfony 4
* Mysql

### Project dependencies
[Composer](https://getcomposer.org) is used for managing dependencies.

Run ```composer install``` at root of the project. It will create ```vendor``` directory on file system with all 
necessary dependencies, which are defined in ```composer.lock``` file. 

### Database Connection
open ```.env``` file on root of the project and update this line according to your setup. 
```DATABASE_URL=mysql://root:@127.0.0.1:3306/user_registration1```

### Web server:
If you don't have apache/nginx already configured, you can use php built-in web server as well. 
Open a terminal window & run ```php bin/console server:start``` at root of the project to start the server. 
Then open a browser with address and port where web server started in terminal window.

### DB Schema
DB schema is defined in /config/doctrine/*.orm.xml. 
To generate the necessary schema in database, run ```php bin/console doctrine:schema:update --force``` at root of the project.

### Populating the database
countries.sql and cities.sql are provided in ```data``` directory.

### Login/Logout History
Listeners are defined in ```App\Listener\*``` They track login/logout timings.

