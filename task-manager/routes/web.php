<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; // هاد السطر ضروري باش يعرف فين كاين الكنترولر

// هاد السطر كيصاوب كاع المسارات ديال (index, create, store, edit, update, destroy)
Route::resource('tasks', TaskController::class);

// هاد السطر غير باش إلا دخلتي للرابط الرئيسي يدييك نيشان للمهام
Route::get('/', function () {
    return redirect()->route('tasks.index');
});