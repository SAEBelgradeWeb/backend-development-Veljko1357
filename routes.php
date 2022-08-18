<?php

//index and about routes
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
//contact
$router->get('contact', 'PagesController@contact');

//cars routes
$router->get('cars', 'CarsController@index');
$router->get('cars/upload', 'CarsController@upload');
$router->post('cars/upload', 'CarsController@store');
$router->get('cars/edit', 'CarsController@edit');
$router->post('cars/edit', 'CarsController@update');
$router->get('cars/delete', 'CarsController@delete');
$router->post('cars/update', 'CarsController@update');

//users routes
$router->get('users', 'UsersController@index');
$router->get('users/create', 'UsersController@create');
$router->post('users', 'UsersController@store');
$router->get('users/show', 'UsersController@show');
$router->get('users/edit', 'UsersController@edit');
$router->post('users/edit', 'UsersController@update');
$router->get('users/destroy', 'UsersController@destroy');

//register
$router->get('register', 'AuthController@showRegistrationForm');
$router->post('register', 'AuthController@register');

//login
$router->get('login', 'AuthController@login');
$router->post('login', 'AuthController@login');

//logout
$router->get('logout', 'AuthController@logout');

