<?php

$prefix = config('larapoll_config.prefix');

Route::group(['namespace' => 'Inani\Larapoll\Http\Controllers', 'prefix' => $prefix, 'middleware' => 'web'], function(){

    $middleware = config('larapoll_config.admin_auth');

    $guard = config('larapoll_config.admin_guard');

    Route::middleware(["$middleware:$guard"])->group(function () {
        Route::get('/admin', ['uses' => 'PollManagerController@home', 'as' => 'poll.home']);
        Route::get('/admin/polls', ['uses' => 'PollManagerController@index', 'as' => 'poll.index']);
        Route::get('/admin/polls/create', ['uses' => 'PollManagerController@create', 'as' => 'poll.create']);
        Route::get('/admin/polls/{poll}', ['uses' => 'PollManagerController@edit', 'as' => 'poll.edit']);
        Route::patch('/admin/polls/{poll}', ['uses' => 'PollManagerController@update', 'as' => 'poll.update']);
        Route::delete('/admin/polls/{poll}', ['uses' => 'PollManagerController@remove', 'as' => 'poll.remove']);
        Route::patch('/admin/polls/{poll}/lock', ['uses' => 'PollManagerController@lock', 'as' => 'poll.lock']);
        Route::patch('/admin/polls/{poll}/unlock', ['uses' => 'PollManagerController@unlock', 'as' => 'poll.unlock']);
        Route::post('/admin/polls', ['uses' => 'PollManagerController@store', 'as' => 'poll.store']);
    });

    Route::post('/vote/polls/{poll}', 'VoteManagerController@vote')->name('poll.vote');
});
