<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//My Events routes
Route::get('/myevents', 'ShowCreatedEvents@displayCreatedEventOlahraga');
Route::get('/myevents/created', 'ShowCreatedEvents@displayCreatedEventOlahraga');
Route::get('/myevents/joined', 'ShowJoinedEvents@displayJoinedEventOlahraga');
Route::get('/myevents/requested', 'ShowRequestedEvents@displayRequestedEventOlahraga');

//Event details routes
Route::get('/event/details/{idevent}', 'ShowEventDetailsController@showEventDetails');

//Delete event routes
Route::get('/event/delete/{idevent}', 'DeleteEventController@deleteEvent');

//Show user information
Route::get('/user/{username}', 'ShowUserInformationController@getUserInformation');

//Remove participants
Route::get('/event/{idevent}/removeparticipant/{username}', 'RemoveParticipantsController@deleteParticipant');

//Respond to a join request
Route::get('/event/{idevent}/accjoinreq/{username}', 'RespondToAJoinRequestController@acceptJoinRequest');
Route::get('/event/{idevent}/decjoinreq/{username}', 'RespondToAJoinRequestController@declineJoinRequest');

//Request to join events
Route::get('/event/{idevent}/reqtojoin/{username}', 'RequestToJoinEventsController@sendJoinRequest');

//Cancel join request to events
Route::get('/event/{idevent}/canceljoinreq/{username}', 'CancelJoinRequestToEventsController@cancelJoinRequest');
