<?php
Route::prefix('user')
    ->namespace('App\modules\User\Http\Controllers')
    ->group(base_path('app/modules/User/routes.php'));
