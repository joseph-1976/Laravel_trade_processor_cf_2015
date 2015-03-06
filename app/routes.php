<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use Illuminate\Support\Facades\Route;

//attach the frontend route to controller
Route::controller('frontend', 'FrontendControllerCF');

//message/create action has rate limiting enabled (200 requests per 30 mins)
Route::post('message/invoke', array('before' => 'throttle:200,30',
                                   'uses' => 'MessageControllerCF@InvokedPost'));

//project index redirects to frontend index page
Route::get('/', 'FrontendControllerCF@getIndex');