<?php

use App\Http\Controllers\CaseNoteController;
use App\Http\Controllers\CaseUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\CourtSpecificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeEntryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:client')->group(function () {
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'main'])->name('dashboardContoller.main');

    Route::resource('users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

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

    Route::prefix('legal-cases/{legal_case}')->group(function () {
        Route::resource('time-entries', TimeEntryController::class);
    });

    Route::resource('court-specifications', CourtSpecificationController::class);
    Route::post('legal-cases/{legalCase}/transfer', [LegalCaseController::class, 'transfer'])->name('legal-cases.transfer');

    // Invoice
    Route::get('legal-cases/{legalCase}/invoices/create', [InvoiceController::class, 'create'])->name('legal-cases.invoices.create');
    Route::post('legal-cases/{legalCase}/invoices', [InvoiceController::class, 'store'])->name('legal-cases.invoices.store');
    Route::delete('legal-cases/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('legal-cases.invoices.destroy');

    // InvoiceItems
    Route::get('invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('invoices/{invoice}/items/create', [InvoiceItemController::class, 'create'])->name('invoice-items.create');
    Route::post('invoices/{invoice}/items', [InvoiceItemController::class, 'store'])->name('invoice-items.store');
    Route::delete('invoices/items/{invoiceItem}', [InvoiceItemController::class, 'destroy'])->name('invoice-items.destroy');
});

require __DIR__ . '/auth.php';
