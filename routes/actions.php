<?php

Route::get('/donations/new', Donation\Create::class);
Route::redirect('/', '/donations/new');

Route::group(['middleware' => ['auth']], function ($router) {
});
