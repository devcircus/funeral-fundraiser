<?php

Route::get('/donations/new', Donation\Create::class);
Route::redirect('/', '/donations/new');
Route::post('/donate', Donation\Store::class)->middleware('money');

Route::group(['middleware' => ['auth']], function ($router) {
});
