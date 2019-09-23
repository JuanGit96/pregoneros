<?php

/*
 * RUTAS PARA REGISTRO, LOGIN Y LOGOUT
 *
 * */

Route::post('register', 'Api\UserController@store');

Route::post('login', 'Api\Auth\LoginController@login');

Route::post('logout', 'Api\Auth\LoginController@logout');


/*
 *
 * RUTAS QUE REQUIEREN AUTENTICACIÓN
 * */


Route::group(['middleware' => 'auth:api'], function() {

    /*
     * RUTAS PARA MANEJO DE USUARIOS
     *
     * */

    Route::prefix('users')->group(function () {

        Route::get('/', 'Api\UserController@index');

        Route::get('/{id}', 'Api\UserController@show');

        Route::put('/{id}', 'Api\UserController@update');

        Route::delete('/{id}', 'Api\UserController@destroy');

    });


    /*
     * RUTAS PARA CONTROL DE MULTIMEDIA EN CHECKLIST
     * */

    Route::get('pregones/multimediacamps/{id}','Api\PregonController@multimediacamps')->name('multimediacamps');


    /*
     *
     * RUTAS PARA ADMINISTRACION DE PREGONES HECHOS POR EL USUARIO
     *
     * */


    Route::resource('usuarioPregon','Api\UsuarioPregonController',
        [
            'except'=> ['create','edit']
        ]);

    //Route::get('usuarioPregon/downloadFile/{id}/{file}','Api\UsuarioPregonController@downloadFile')->name('usuarioPregon.download');

    /*
     * RUTAS PARA ADMINISTRACION DE LOS PREGONES DISPONIBLES
     *
     * */

    Route::resource('pregones','Api\PregonController',
        [
            'only'=>['index','show']
        ]);


    /*
     * RUTAS PARA PREGUNTAS Y RESPUESTAS
     * */

    Route::get('faq','Api\FaqController@index');

    /*
     * RUTAS PARA EXPERIENCIAS
     * */

    Route::get('experiencia/multimediacamps/{id}','Api\ExperiencesController@multimediacamps')->name('multimediacamps_experiences');

    Route::get('experiencia/aprobado/{id_pregon}/{id_usuario}','Api\ExperiencesController@experienciaAprobada')->name('experienciaAprobada');

    Route::resource('experiences','Api\ExperiencesController',
        [
            'only'=>['store']
        ]);

    /*
     * ENVIO DE PUSH NOTIFICAIIONS
     * */

    Route::get('pushNotification/{id}','Api\PushUserPregonController@sendPregonPush');

    /*
     * Notificaciones experiencias aprobadas
     * */

    Route::get('pushExpereinces/{id}','Api\PushExperienceController@sendPushNotifications')->name('sendPushNotificationsExperience');

    /*
     * REDENCION DE CODIGO
     *
     * */

    Route::post('user/redention','Api\RedentionController@store')->name('redentionUser');

});
