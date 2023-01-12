<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientDocumentController;
use App\Http\Controllers\Client\ClientProjectController;
use App\Http\Controllers\ContentDetailController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\Organization\OrganizationClientController;
use App\Http\Controllers\Organization\OrganizationDocumentController;
use App\Http\Controllers\Organization\OrganizationProjectController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectDocumentController;
use App\Http\Controllers\Project\ProjectTaskController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\RolePermissionController;
use App\Http\Controllers\Role\RoleUserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SpreadSheetController;
use App\Http\Controllers\Task\TaskCommentController;
use App\Http\Controllers\Task\TaskContentDetailController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Task\TaskDocumentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProjectController;
use App\Http\Controllers\User\UserTaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('users.projects', UserProjectController::class)->only(['index']);
    Route::resource('users.tasks', UserTaskController::class)->only(['index']);

    Route::resource('clients', ClientController::class);
    Route::resource('clients.projects', ClientProjectController::class)->only(['index']);
    Route::resource('clients.documents', ClientDocumentController::class)->only(['index', 'store']);

    Route::resource('organizations', OrganizationController::class);
    Route::resource('organizations.clients', OrganizationClientController::class)->only(['index']);
    Route::resource('organizations.projects', OrganizationProjectController::class)->only(['index']);
    Route::resource('organizations.documents', OrganizationDocumentController::class)->only(['index', 'store']);

    Route::resource('projects', ProjectController::class);
    Route::resource('projects.tasks', ProjectTaskController::class)->only(['index']);
    Route::resource('projects.documents', ProjectDocumentController::class)->only(['index', 'store']);
    Route::post('project/status',[ProjectController::class,'status_change'])->name('project.status');

    Route::resource('tasks', TaskController::class);
    Route::resource('tasks.documents', TaskDocumentController::class)->only(['index', 'store']);
    Route::resource('tasks.content-detail', TaskContentDetailController::class);
    Route::get('task/content-detail/{id}/edit', [TaskContentDetailController::class,'edit'])->name('task.content-detail.edit');
    Route::post('task/content-detail/{id}/update', [TaskContentDetailController::class,'update'])->name('task.content-detail.update');
    Route::delete('task/content-detail/{id}/destroy', [TaskContentDetailController::class,'destroy'])->name('task.content-detail.destroy');
    Route::post('task/status',[TaskController::class,'status_change'])->name('task.status');
    Route::resource('tasks.comments', TaskCommentController::class)->only(['index','store']);
    Route::resource('documents', DocumentController::class)->only(['show', 'update', 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::resource('roles.permissions', RolePermissionController::class)->only(['index']);
    Route::resource('roles.users', RoleUserController::class)->only(['index']);


Route::get('file-import-export', [SaleController::class, 'fileImportExport']);
Route::post('file-import', [SaleController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [SaleController::class, 'fileExport'])->name('file-export');

Route::get('getSalesData',[SaleController::class,'getSales'])->name('sale.listing');

Route::resource('sales',SaleController::class);


Route::resource('content-details',ContentDetailController::class);
Route::post('content-import', [ContentDetailController::class, 'fileImport'])->name('content-import');
Route::get('content-export', [ContentDetailController::class, 'fileExport'])->name('content-export');


Route::get('spreadsheets',[SpreadSheetController::class,'index'])->name('spreadsheets.index');
Route::post('spreadsheets',[SpreadSheetController::class,'store'])->name('spreadsheets.store');
Route::get('spreadsheets/{id}',[SpreadSheetController::class,'show'])->name('spreadsheets.show');
Route::get('spreadsheets/{id}/edit',[SpreadSheetController::class,'edit'])->name('spreadsheets.edit');
Route::post('spreadsheets/{id}',[SpreadSheetController::class,'update'])->name('spreadsheets.update');
Route::get('spreadsheet/{id}',[SpreadSheetController::class,'destroy'])->name('spreadsheets.delete');
});

