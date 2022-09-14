<?php

Route::get('/{any?}', function () {
    return view('index');
})->where('any', '.+');
