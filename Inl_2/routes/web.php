<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
$app->get('/hej', function () {
    return 'Soon, we will list the products here!';
});

$app->get('/products', 'ProductController@index');

$app->get('/products/{id}', 'ProductController@showProduct');

$app->get('/stores', 'ProductController@stores');

$app->get('/reviews', 'ProductController@reviews');

$app->post('/products', 'ProductController@create');

?>
