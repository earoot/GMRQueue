<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
  Route::group(['middleware' => ['auth:api']], function () {
      Route::post("schedule", "api\\v1\\JobsController@schedule");
      Route::get("jobs/{group}", "api\\v1\\JobsController@getJobsByGroup");
  });

  Route::post("login", "api\\v1\\LoginController@authenticate");
  Route::post("register", "api\\v1\\RegisterController@register");
  Route::post("register-bash", "api\\v1\\RegisterController@registerBash");
});

Route::get("auth-failed", "api\\v1\\UsersController@authRequired")->name("authFailed");
