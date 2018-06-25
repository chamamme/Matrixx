> This readme is still underconstruction so please bear with us.
# Matrixx
**Matrix** is a lightweight  PHP framework designed with speed at its core. 
Matrix follows a very simple model-view-controller architecture so if you have ever used Symfony, Laravel or CodeIgnitor 
framework then you should feel at home.

## Dependencies
- PHP 7.*
- Composer 1.6* 

## Installation
- Clone/Download into your project directory and run <code> composer install </code> to install dependencies

- To serve it navigate to <code> project_path/public </code> and run <code> php -S localhost:8000 </code> in your terminal. 
    If you arlready have xampp installed then copy to your htdocs and access it in browser with http://localhost/Matrix

## Documentation
Matrix is a model->view-controller based web application framework and its largely inspired by Laravel and asuch follows its syntax.
### Configuration
The best way to start is to configure the app for your environment. The configuration file is located at the root of the project directory.ie <code> path_to_project/config.php </code> and it contains an array of configurations. Below are a list of some basic configurations to start with.
- *app* : it contains the details of the app. 


### Routing
  All application routes are stored in /routes.php file. Routes are easy to define by using the $route variable using the syntax below.
  <code> $route->**\<request method\>**\(\'**\<controllerName\>**@**\<method\>**\'\) </code> where;
 - <code>request method</code> is the request method  it should accept. Matrix currently supports five(5) HTTP request methods and these are *<code>GET,POST,DELETE,PUT,PATCH</code>*
 - <code>controllerName</code> is the controller class it should use.
 - <code>method</code> is the class method to be used. This is also the output function because only the code in this function will run
  So a typical <code>GET</code> route will look like:
    >$route->get("PostController@get")
### Controllers
  Controllers contains the business logics of the application and a stored in **<code>/app/controllers/</code>** directory.
 
  
  
  
