<?php

use App\Livewire\TodoListComponent;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::login(User::find(1));
Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos/{list}', TodoListComponent::class);
Route::get('/todos/', TodoListComponent::class);
Route::delete('/todos/{list}', function (TodoList $list) {
    $list->delete();
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
