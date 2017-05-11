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

$app->get('/products', 'ProductController@index');

$app->get('/products/{id}', 'ProductController@show');

$app->post('/products', 'ProductController@create');

$app->delete('/products', function () {
    return 'Soon, we will list the products here!';
});
?>
