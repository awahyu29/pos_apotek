<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    HolidayController,
    RoleController,
    TaskController,
    TrashController,
    UserController,
    SalaryController,
    HomeController,
    MechineController,
    OvertimeController,
    PresenceController,
    PresenceConfigController,
    PresenceLogController,
    PaidLeaveController,
    GeneratePaidLeaveController,
    DepartementController,
    GenerateOvertimeController,
    BarangController,
    JenisBarangController,
    SuplierController,
    BarangMasukController,
    BarangKeluarController,
    PemesananController
};
use App\Models\jenis_barang;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home',                                 [HomeController::class, 'index'])->name('home');
    Route::patch('/users/reset/{id?}',                  [UserController::class, 'reset'])->name('users.reset');
    Route::resource('roles',                            RoleController::class);
    Route::get('trashs/{id}',                           [TrashController::class, 'listTrash'])->name('list.trashs');
    Route::get('trashs/paidleaves/restore/{id?}',       [TrashController::class,'restorePaidLeaves'])->name('trashs.paidleaves.restore');
    Route::delete('trashs/paidleaves/delete/{id?}',     [TrashController::class,'deletePaidLeaves'])->name('trashs.paidleaves.delete');
    Route::get('trashs/overtimes/restore/{id?}',        [TrashController::class,'restoreOvertimes'])->name('trashs.overtimes.restore');
    Route::delete('trashs/overtimes/delete/{id?}',      [TrashController::class,'deleteOvertimes'])->name('trashs.overtimes.delete');
    Route::get('trashs/users/restore/{id?}',            [TrashController::class,'restoreUsers'])->name('trashs.users.restore');
    Route::delete('trashs/users/delete/{id?}',          [TrashController::class,'deleteUsers'])->name('trashs.users.delete');
    Route::get('trashs/tasks/restore/{id?}',            [TrashController::class,'restoreTasks'])->name('trashs.tasks.restore');
    Route::delete('trashs/tasks/delete/{id?}',          [TrashController::class,'deleteTasks'])->name('trashs.tasks.delete');
    Route::get('trashs/departements/restore/{id?}',     [TrashController::class,'restoreDepartements'])->name('trashs.departements.restore');
    Route::delete('trashs/departements/delete/{id?}',   [TrashController::class,'deleteDepartements'])->name('trashs.departements.delete');
    Route::get('trashs/salaries/restore/{id?}',         [TrashController::class,'restoreSalaries'])->name('trashs.salaries.restore');
    Route::delete('trashs/salaries/delete/{id?}',       [TrashController::class,'deleteSalaries'])->name('trashs.salaries.delete');
    Route::resource('trashs',                           TrashController::class);
    Route::resource('users',                            UserController::class);
    Route::resource('tasks',                            TaskController::class);
    Route::resource('departements',                     DepartementController::class);
    Route::resource('presences',                        PresenceController::class);
    Route::resource('salaries',                         SalaryController::class);
    Route::resource('mechine',                          MechineController::class);
    Route::resource('barang',                           BarangController::class);
    Route::resource('jenisbarang',                      JenisBarangController::class);
    Route::resource('suplier',                          SuplierController::class);
    Route::resource('barangmasuk',                      BarangMasukController::class);
    Route::resource('barangkeluar',                     BarangKeluarController::class);
    Route::get('barangkeluar/cetak',                    [BarangKeluarController::class, 'cetak'])->name('barangkeluar.cetak');
    // Route::get('/barangkeluar/cetak', 'BarangKeluarController@cetak');
    Route::resource('pemesanan',                        PemesananController::class);
    Route::resource('config',                           PresenceConfigController::class);
    Route::get('overtime/{id?}/export',                 [GenerateOvertimeController::class, 'export'])->name('overtime.export');
    Route::get('overtime/history',                      [OvertimeController::class, 'indexHistory'])->name('overtime.history');
    Route::resource('overtime',                         OvertimeController::class);
    Route::get('paidleave/{id?}/export',                [GeneratePaidLeaveController::class, 'export'])->name('paidleave.export');
    Route::get('paidleave/history',                     [PaidLeaveController::class, 'indexHistory'])->name('paidleave.history');
    Route::resource('paidleave',                        PaidLeaveController::class);
    Route::get('/get/datatables/mechine',               [MechineController::class, 'getDtRowData'])->name('get.datatables.mechine');
    Route::get('/profile',                              [HomeController::class, 'profile'])->name('profile');
    Route::patch('/profileupdate/{id?}',                [HomeController::class, 'profileupdate'])->name('profileupdate');
    Route::post('presencelogs',                         [PresenceLogController::class, 'sync'])->name('sync');
    Route::get('/cleaner',                              [HomeController::class, 'cleaner'])->name('cleaner');
    Route::get('/viewclear',                            [HomeController::class, 'viewclear'])->name('viewclear');
    Route::get('/routeclear',                           [HomeController::class, 'routeclear'])->name('routeclear');
    Route::get('/configclear',                          [HomeController::class, 'configclear'])->name('configclear');
    Route::get('/cacheclear',                           [HomeController::class, 'cacheclear'])->name('cacheclear');
    Route::get('/clearall',                             [HomeController::class, 'clearall'])->name('clearall');
});
