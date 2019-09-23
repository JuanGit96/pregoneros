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

if(! defined('PATH_MOD_USERS'))
    define('PATH_MOD_ADMIN', 'Admin\\');

Route::get('api/downloadTerms','TermsController@downloadManageDataPersonalInformationPdf');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/redime', function () {
    return view('redime');
});
Route::get('/trabaja', function () {
    return view('trabaja');
});
Route::get('/pauta', function () {
    return view('pauta');
});

Route::post('/redimecdigo', 'ConsumerController@store')->name('redimecdigo');

Route::post('/interesados', 'InterestedController@store')->name('interesados');

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    /*
 * RUTAS SECCION ADMINISTRATIVA
 * */

    Route::group(['prefix'=>'admin'], function () {

        Route::resource('users',PATH_MOD_ADMIN.'UserController');

        Route::resource('clients',PATH_MOD_ADMIN.'ClientController');

        Route::resource('campaigns',PATH_MOD_ADMIN.'CampaignController');

        Route::resource('pregons',PATH_MOD_ADMIN.'PregonController');

        Route::get('pregons/capturecodepregon/{id}',PATH_MOD_ADMIN.'PregonController@capturecodepregon')->name('capturecodepregon');

        Route::resource('usuarioPregons',PATH_MOD_ADMIN.'PregonSuccessController');

        Route::resource('faqs',PATH_MOD_ADMIN.'FaqController');

        Route::resource('experiences',PATH_MOD_ADMIN.'ExperienceController');

        Route::resource('redentions',PATH_MOD_ADMIN.'RedentionController');

    });



});





