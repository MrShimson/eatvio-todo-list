<?php

use App\Livewire\Auth;
use App\Livewire\ListUsers;
use App\Livewire\TodoList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',ListUsers::class);
Route::get('/todo-lists', TodoList::class);
