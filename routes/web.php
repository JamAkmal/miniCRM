<?php
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Company;
use App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

Route::group(['middleware' => 'adminauth'], function () {
    Route::get('/welcome', function () {
        $companies = \App\Models\Company::paginate(5);
        return view('welcome',compact('companies'));
    })->name('adminDashboard');

    // compnay routes
    Route::get('/companies', [Company::class, 'index'])->name('company.index');
    Route::get('/companies/create', [Company::class, 'create'])->name('company.create');
    Route::post('/companies', [Company::class, 'store'])->name('company.store');
    Route::get('/companies/{company}/view', [Company::class, 'view'])->name('company.view');
    Route::get('/companies/{company}/edit', [Company::class, 'edit'])->name('company.edit');
    Route::put('/companies/{company}', [Company::class, 'update'])->name('company.update');
    Route::delete('/companies/{company}', [Company::class, 'destroy'])->name('company.destroy');

    // compnay routes
    Route::get('/employees', [Employee::class, 'index'])->name('employee.index');
    Route::get('/employees/create', [Employee::class, 'create'])->name('employee.create');
    Route::post('/employees', [Employee::class, 'store'])->name('employee.store');
    Route::get('/employees/{employee}/edit', [Employee::class, 'edit'])->name('employee.edit');
    Route::put('/employees/{employee}', [Employee::class, 'update'])->name('employee.update');
    Route::delete('/employees/{employee}', [Employee::class, 'destroy'])->name('employee.destroy');

    // Modify the logout route and its logic
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
});