<?php

use App\Livewire\CreateUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', CreateUser::class);
