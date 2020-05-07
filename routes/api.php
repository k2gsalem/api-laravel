<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['middleware' => ['throttle:60,1', 'bindings'], 'namespace' => 'App\Http\Controllers'], function ($api) {

        $api->get('ping', 'Api\PingController@index');

        $api->get('assets/{uuid}/render', 'Api\Assets\RenderFileController@show');

        $api->group(['middleware' => ['auth:api'],], function ($api) {

            $api->group(['prefix' => 'users'], function ($api) {
                $api->get('/', 'Api\Users\UsersController@index');
                $api->post('/', 'Api\Users\UsersController@store');
                $api->get('/{uuid}', 'Api\Users\UsersController@show');
                $api->put('/{uuid}', 'Api\Users\UsersController@update');
                $api->patch('/{uuid}', 'Api\Users\UsersController@update');
                $api->delete('/{uuid}', 'Api\Users\UsersController@destroy');
            });

            $api->group(['prefix' => 'roles'], function ($api) {
                $api->get('/', 'Api\Users\RolesController@index');
                $api->post('/', 'Api\Users\RolesController@store');
                $api->get('/{uuid}', 'Api\Users\RolesController@show');
                $api->put('/{uuid}', 'Api\Users\RolesController@update');
                $api->patch('/{uuid}', 'Api\Users\RolesController@update');
                $api->delete('/{uuid}', 'Api\Users\RolesController@destroy');
            });

            $api->get('permissions', 'Api\Users\PermissionsController@index');

            $api->group(['prefix' => 'me'], function ($api) {
                $api->get('/', 'Api\Users\ProfileController@index');
                $api->put('/', 'Api\Users\ProfileController@update');
                $api->patch('/', 'Api\Users\ProfileController@update');
                $api->put('/password', 'Api\Users\ProfileController@updatePassword');
            });

            $api->group(['prefix' => 'assets'], function ($api) {
                $api->post('/', 'Api\Assets\UploadFileController@store');
            });

            // gopi
            $api->group(['prefix' => 'albums'], function ($api) {
                  
            
                //Albums
                $api->post('/createAlbum','Api\Kids\AlbumController@store');   //create new album
                $api->put('/updateAlbum/{id}','Api\Kids\AlbumController@update'); //update album with id
                $api->delete('/deleteAlbum/{id}','Api\Kids\AlbumController@destroy'); //delele album with id
            
                //Photos
                $api->post('/createBulkPhotos','Api\Kids\PhotoController@storebulk');
                $api->post('/createPhotos','Api\Kids\PhotoController@store');   //upload new photo
                $api->put('/updatePhotos/{id}','Api\Kids\PhotoController@update'); //update photo with id
                $api->delete('/deletePhotos/{id}','Api\Kids\PhotoController@destroy'); //delele photo with id
            
                $api->post('/createVideos','Api\Kids\VideoController@store');   //upload new photo
                $api->put('/updateVideos/{id}','Api\Kids\VideoController@update'); //update photo with id
                $api->delete('/deleteVideos/{id}','Api\Kids\VideoController@destroy'); //delele photo with id
            
              

            });
            $api->group(['prefix' => 'testimonials'], function ($api) {
                $api->post('/writeReview', 'Api\Kids\TestimonialsController@store');
                $api->put('/editReview/{id}', 'Api\Kids\TestimonialsController@update');
                $api->delete('/deleteReview/{id}', 'Api\Kids\TestimonialsController@destroy');//dek
            
                $api->post('/createVideos','Api\Kids\TestimonialVideoController@store');   //upload new photo
                $api->put('/updateVideos/{id}','Api\Kids\TestimonialVideoController@update'); //update photo with id
                $api->delete('/deleteVideos/{id}','Api\Kids\TestimonialVideoController@destroy');
            });
        });
    });
});
