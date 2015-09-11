<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('/customers', ['as' => 'customers.index','uses' => 'CustomersController@index']);
$app->post('/customers', ['as' => 'customers.store','uses' => 'CustomersController@store']);
$app->get('/customers/{customerId}',['as' => 'customers.show' ,'uses'=>'CustomersController@show']);
$app->put('/customers/{customerId}',['as' => 'customers.update' ,'uses'=>'CustomersController@update']);
$app->delete('/customers/{customerId}',['as' => 'customers.delete' ,'uses'=>'CustomersController@delete']);



$app->get('/customers/{customerId}/contact-details',['as' => 'contactDetails.show' ,'uses'=>'ContactDetailsController@show']);
$app->post('/customers/{customerId}/contact-details',['as' => 'contactDetails.create' ,'uses'=>'ContactDetailsController@store']);
$app->put('/customers/{customerId}/contact-details',['as' => 'contactDetails.update' ,'uses'=>'ContactDetailsController@update']);


$app->get('/customers/{customerId}/billing-details',['as' => 'billingDetails.show' ,'uses'=>'BillingDetailsController@show']);
$app->post('/customers/{customerId}/billing-details',['as' => 'billingDetails.create' ,'uses'=>'BillingDetailsController@store']);
$app->put('/customers/{customerId}/billing-details',['as' => 'billingDetails.update' ,'uses'=>'BillingDetailsController@update']);
$app->delete('/customers/{customerId}/billing-details',['as' => 'billingDetails.delete' ,'uses'=>'BillingDetailsController@delete']);
