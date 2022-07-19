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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

// Show home
Route::get('/', 'HomeController@showHome');
Route::get('/home', 'HomeController@showHome');

//Show Events by Category (Browse) route
Route::get('/browse', 'BrowseController@showBrowse');
Route::post('/browse/filter', 'BrowseController@filterBrowse');

//Forget Reset Password Routes
Route::get('/reset-password', 'ResetPasswordController@displayResetpasswordpage');
Route::post('/reset-password', 'ResetPasswordController@ResetPassword');
//My Events routes
Route::get('/my-events', 'ShowCreatedEvents@displayCreatedEventOlahraga');
Route::get('/my-events/created', 'ShowCreatedEvents@displayCreatedEventOlahraga');
Route::get('/my-events/joined', 'ShowJoinedEvents@displayJoinedEventOlahraga');
Route::get('/my-events/requested', 'ShowRequestedEvents@displayRequestedEventOlahraga');

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

//Create events routes
Route::get('/create-event','CreateEventsController@showCreateEvents');
Route::post('/create-event/store','CreateEventsController@store');

//Edit events route
Route::get('/event/edit/{idevent}','EditEventController@editEvent');
Route::post('/event/update/{idevent}','EditEventController@update');

//Show notfications
Route::get('/notifications', 'NotificationsController@showNotifications');

// Clear notifications
Route::post('/notifications/clear', 'NotificationsController@deleteAllNotifications');

//Edit Profile
Route::get('/profile/edit', 'EditProfileController@edit');
Route::post('/profile/update', 'EditProfileController@update');

//Show Profil
Route::get('/profile', 'ProfileController@getProfile');

