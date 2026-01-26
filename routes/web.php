<?php

use App\Http\Controllers\CaseNoteController;
use App\Http\Controllers\CaseUserController;
use App\Http\Controllers\ClientCaseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\ClientDocumentController;
use App\Http\Controllers\ClientInvoiceController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\CourtSpecificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeEntryController;
use App\Http\Controllers\TreasuryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('notifications')
    ->name('notifications.')
    ->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');

        Route::post('{notification}/read', [NotificationController::class, 'markAsRead'])->name('read');
    });

Route::middleware('auth:client')
    ->prefix('client/notifications')
    ->name('client.notifications.')
    ->group(function () {
        Route::get('/', [NotificationController::class, 'clientIndex'])->name('index');

        Route::post('{notification}/read', [NotificationController::class, 'markAsRead'])->name('read');
    });

Route::prefix('client')
    ->name('client.')
    ->middleware('auth:client')
    ->group(function () {
        Route::get('/profile', [ClientProfileController::class, 'show'])->name('profile');
        Route::put('/profile', [ClientProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ClientProfileController::class, 'updatePassword'])->name('profile.password');
        Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
        Route::get('/cases', [ClientCaseController::class, 'index'])->name('cases.index');
        Route::get('/documents', [ClientDocumentController::class, 'index'])->name('documents.index');
        Route::get('/invoices', [ClientInvoiceController::class, 'index'])->name('invoices.index');
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

    Route::get('legal-cases/{legalCase}/invoices/create', [InvoiceController::class, 'create'])->name('legal-cases.invoices.create');
    Route::post('legal-cases/{legalCase}/invoices', [InvoiceController::class, 'store'])->name('legal-cases.invoices.store');
    Route::delete('legal-cases/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('legal-cases.invoices.destroy');

    Route::get('invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('invoices/{invoice}/items/create', [InvoiceItemController::class, 'create'])->name('invoice-items.create');
    Route::post('invoices/{invoice}/items', [InvoiceItemController::class, 'store'])->name('invoice-items.store');
    Route::delete('invoices/items/{invoiceItem}', [InvoiceItemController::class, 'destroy'])->name('invoice-items.destroy');

    Route::get('/treasury', [TreasuryController::class, 'index'])
        ->name('treasury.index')
        ->middleware('auth');
});

require __DIR__ . '/auth.php';
