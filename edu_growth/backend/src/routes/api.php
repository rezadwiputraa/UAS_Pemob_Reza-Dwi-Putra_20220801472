<?php

// Client
use App\Filament\Admin\Resources\ClientResource\Api\Handlers\CreateHandler as ClientCreateHandler;
use App\Filament\Admin\Resources\ClientResource\Api\Handlers\DeleteHandler as ClientDeleteHandler;
use App\Filament\Admin\Resources\ClientResource\Api\Handlers\DetailHandler as ClientDetailHandler;
use App\Filament\Admin\Resources\ClientResource\Api\Handlers\PaginationHandler as ClientPaginationHandler;
use App\Filament\Admin\Resources\ClientResource\Api\Handlers\UpdateHandler as ClientUpdateHandler;

// Product
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\CreateHandler as ProductCreateHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\DeleteHandler as ProductDeleteHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\DetailHandler as ProductDetailHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\PaginationHandler as ProductPaginationHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\UpdateHandler as ProductUpdateHandler;

// Course
use App\Filament\Admin\Resources\CourseResource\Api\Handlers\CreateHandler as CourseCreateHandler;
use App\Filament\Admin\Resources\CourseResource\Api\Handlers\DeleteHandler as CourseDeleteHandler;
use App\Filament\Admin\Resources\CourseResource\Api\Handlers\DetailHandler as CourseDetailHandler;
use App\Filament\Admin\Resources\CourseResource\Api\Handlers\PaginationHandler as CoursePaginationHandler;
use App\Filament\Admin\Resources\CourseResource\Api\Handlers\UpdateHandler as CourseUpdateHandler;

// Report
use App\Filament\Admin\Resources\ReportResource\Api\Handlers\CreateHandler as ReportCreateHandler;
use App\Filament\Admin\Resources\ReportResource\Api\Handlers\DeleteHandler as ReportDeleteHandler;
use App\Filament\Admin\Resources\ReportResource\Api\Handlers\DetailHandler as ReportDetailHandler;
use App\Filament\Admin\Resources\ReportResource\Api\Handlers\PaginationHandler as ReportPaginationHandler;
use App\Filament\Admin\Resources\ReportResource\Api\Handlers\UpdateHandler as ReportUpdateHandler;

// Pelatihan
use App\Filament\Admin\Resources\PelatihanResource\Api\Handlers\CreateHandler as PelatihanCreateHandler;
use App\Filament\Admin\Resources\PelatihanResource\Api\Handlers\DeleteHandler as PelatihanDeleteHandler;
use App\Filament\Admin\Resources\PelatihanResource\Api\Handlers\DetailHandler as PelatihanDetailHandler;
use App\Filament\Admin\Resources\PelatihanResource\Api\Handlers\PaginationHandler as PelatihanPaginationHandler;
use App\Filament\Admin\Resources\PelatihanResource\Api\Handlers\UpdateHandler as PelatihanUpdateHandler;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    // Protected route
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    // Client
    Route::prefix('clients')->group(function () {
        Route::post('/', [ClientCreateHandler::class, 'handler'])->name('api.clients.create');
        Route::get('/', [ClientPaginationHandler::class, 'handler'])->name('api.clients.pagination');
        Route::get('/{id}', [ClientDetailHandler::class, 'handler'])->name('api.clients.detail');
        Route::put('/{id}', [ClientUpdateHandler::class, 'handler'])->name('api.clients.update');
        Route::delete('/{id}', [ClientDeleteHandler::class, 'handler'])->name('api.clients.delete');
    });

    // Group untuk products API
    Route::prefix('products')->group(function () {
        Route::post('/', [ProductCreateHandler::class, 'handler'])->name('api.products.create');
        Route::get('/', [ProductPaginationHandler::class, 'handler'])->name('api.products.pagination');
        Route::get('/{id}', [ProductDetailHandler::class, 'handler'])->name('api.products.detail');
        Route::put('/{id}', [ProductUpdateHandler::class, 'handler'])->name('api.products.update');
        Route::delete('/{id}', [ProductDeleteHandler::class, 'handler'])->name('api.products.delete');
    });

    // Group untuk courses API
    Route::prefix('courses')->group(function () {
        Route::post('/', [CourseCreateHandler::class, 'handler'])->name('api.courses.create');
        Route::get('/', [CoursePaginationHandler::class, 'handler'])->name('api.courses.pagination');
        Route::get('/{id}', [CourseDetailHandler::class, 'handler'])->name('api.courses.detail');
        Route::put('/{id}', [CourseUpdateHandler::class, 'handler'])->name('api.courses.update');
        Route::delete('/{id}', [CourseDeleteHandler::class, 'handler'])->name('api.courses.delete');
    });

    // Report
    Route::prefix('reports')->group(function () {
        Route::post('/', [ReportCreateHandler::class, 'handler'])->name('api.reports.create');
        Route::get('/', [ReportPaginationHandler::class, 'handler'])->name('api.reports.pagination');
        Route::get('/{id}', [ReportDetailHandler::class, 'handler'])->name('api.reports.detail');
        Route::put('/{id}', [ReportUpdateHandler::class, 'handler'])->name('api.reports.update');
        Route::delete('/{id}', [ReportDeleteHandler::class, 'handler'])->name('api.reports.delete');
    });
});
