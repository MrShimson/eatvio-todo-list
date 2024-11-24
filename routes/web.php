<?php

use App\Livewire\ListUsers;
use App\Livewire\TodoListDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',ListUsers::class);
Route::get('/dashboard', TodoListDashboard::class);
