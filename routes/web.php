<?php

$router->group(['prefix' => '/api'], function () use ($router) {

    $router->get('/series', 'SeriesController@index');

});
