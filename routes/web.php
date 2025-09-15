<?php

use App\Http\Controllers\CaseNoteController;
use App\Http\Controllers\CaseUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'main'])->name('dashboardContoller.main');

    Route::resource('users', UserController::class);
    Route::get('my-account', [UserController::class, 'account'])->name('account');

    Route::resource('clients', ClientController::class);
    Route::resource('legal-cases', LegalCaseController::class);

    Route::prefix('legal-cases/{legal_case}')->group(function () {
        Route::get('users', [CaseUserController::class, 'index'])->name('case-users.index');
        Route::post('users', [CaseUserController::class, 'store'])->name('case-users.store');
        Route::put('users/{user}', [CaseUserController::class, 'update'])->name('case-users.update');
        Route::delete('users/{user}', [CaseUserController::class, 'destroy'])->name('case-users.destroy');
    });

    Route::prefix('legal-cases/{legal_case}')->group(function () {
        Route::resource('documents', DocumentController::class)->except(['edit', 'update']);
    });

    Route::prefix('legal-cases/{legal_case}')->group(function () {
        Route::resource('case-notes', CaseNoteController::class);
    });
});

require __DIR__ . '/auth.php';
