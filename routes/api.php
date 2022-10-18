<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ContactExtraController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/contacts/edit-field/{contactId}', [ContactController::class, 'editField'])->name('contacts.edit-field');
Route::delete('/contact-extras/{contactId}', [ContactExtraController::class, 'destroy'])->name('contact-extras.destroy');
// Route::resource('/contact-extras', 'ContactExtraController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
