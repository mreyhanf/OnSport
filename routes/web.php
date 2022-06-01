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
Route::post('/event/delete', 'DeleteEventController@deleteEvent');

//Show user information
Route::get('/user/{username}', 'ShowUserInformationController@getUserInformation');

//Remove participants
Route::post('/event/removeparticipant', 'RemoveParticipantsController@deleteParticipant');

//Respond to a join request
Route::post('/event/accjoinreq', 'RespondToAJoinRequestController@acceptJoinRequest');
Route::post('/event/decjoinreq', 'RespondToAJoinRequestController@declineJoinRequest');

//Request to join events
Route::post('/event/reqtojoin', 'RequestToJoinEventsController@sendJoinRequest');

//Cancel join request to events
Route::post('/event/canceljoinreq', 'CancelJoinRequestToEventsController@cancelJoinRequest');

//Cancel participation from events
Route::post('/event/cancelparticipation', 'CancelParticipationFromAnEventController@cancelParticipation');
