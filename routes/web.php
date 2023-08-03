<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PosController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\CustomerController;
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

Route::get('/', function () {
    return view('welcome');
});

// Admin All Route


// Permission All Route
Route::controller(RoleController::class)->group(function (){
    
    Route::get('/all/permission','AllPermission')->name('all.permission');
    Route::get('/add/permission','AddPermission')->name('add.permission');
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::controller(AdminController::class)->group(function (){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password','ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    /// Employee All Route 
    Route::controller(EmployeeController::class)->group(function(){
        Route::get('/all/employee','AllEmployee')->name('all.employee')->middleware('permission:employee.all');
        Route::get('/add/employee','AddEmployee')->name('add.employee')->middleware('permission:employee.add');
        Route::post('/store/employee','StoreEmployee')->name('employee.store');
        Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee');
        Route::post('/update/employee','UpdateEmployee')->name('employee.update');
        Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');
        
    
    });

    /// Category All Route 
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category','AllCategory')->name('all.category')->middleware('permission:category.all');
        Route::post('/store/category','StoreCategory')->name('category.store');
        Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
        Route::post('/update/category','UpdateCategory')->name('category.update');
        Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');
        
    });

    /// Product All Route 
    Route::controller(ProductController::class)->group(function(){
        Route::get('/all/product','AllProduct')->name('all.product');
        Route::get('/add/product','AddProduct')->name('add.product');
        Route::post('/store/product','StoreProduct')->name('product.store');
        Route::get('/edit/product/{id}','EditProduct')->name('edit.product');
        Route::post('/update/product','UpdateProduct')->name('product.update');
        Route::get('/delete/product/{id}','DeleteProduct')->name('delete.product');
    
    });

    /// Pos All Route 
    Route::controller(PosController::class)->group(function(){
        Route::get('/pos','Pos')->name('pos')->middleware('permission:pos.menu');
        Route::post('/add-cart','AddCart')->middleware('permission:pos.menu');
        Route::get('/allitem','AllItem')->middleware('permission:pos.menu');
        Route::post('/cart-update/{id}','CartUpdate')->middleware('permission:pos.menu');
        Route::get('/cart-remove/{rowId}','CartRemove')->middleware('permission:pos.menu');
        Route::post('/create-invoice','CreateInvoice')->middleware('permission:pos.menu');
        Route::post('/print-invoice','PrintInvoice');
    
    });

    /// Order All Route 
    Route::controller(OrderController::class)->group(function(){
        Route::post('/final-invoice','FinalInvoice');
        Route::get('/pending/order','PendingOrder')->name('pending.order');
        Route::get('/order/details/{order_id}','OrderDetails')->name('order.details');
        Route::post('/order/status/update','OrderStatusUpdate')->name('order.status.update');
        Route::get('/complete/order','CompleteOrder')->name('complete.order');
        Route::get('/stock','StockManage')->name('stock.manage');
        Route::get('/order/complete/{id}','OrderComplete')->name('order.complete');
        Route::get('/order/invoice-download/{order_id}','OrderInvoice');
        Route::post('/clear-invoice','ClearInvoice');
        Route::get('/complete/details/{order_id}','CompleteDetails')->name('complete.details');
        Route::get('/pending/edit/{id}','PendingEdit')->name('pending.edit');

    });

    /// Permission All Route 
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission')->middleware('permission:all.role.permission.menu');
        Route::get('/add/permission','AddPermission')->name('add.permission')->middleware('permission:all.role.permission.menu');
        Route::post('/store/permission','StorePermission')->name('permission.store')->middleware('permission:all.role.permission.menu');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission')->middleware('permission:all.role.permission.menu');
        Route::post('/update/permission','UpdatePermission')->name('permission.update')->middleware('permission:all.role.permission.menu');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission')->middleware('permission:all.role.permission.menu');
        
    });

    /// Role All Route 
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all.roles')->middleware('permission:all.role.permission.menu');
        Route::get('/add/roles','AddRoles')->name('add.roles')->middleware('permission:all.role.permission.menu');
        Route::post('/store/roles','StoreRoles')->name('roles.store')->middleware('permission:all.role.permission.menu');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles')->middleware('permission:all.role.permission.menu');
        Route::post('/update/roles','UpdateRoles')->name('roles.update')->middleware('permission:all.role.permission.menu');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles')->middleware('permission:all.role.permission.menu');
        
    });

    /// Add Role in Permission All Route 
    Route::controller(RoleController::class)->group(function(){
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission')->middleware('permission:all.role.permission.menu');
        Route::post('/role/permission/store','StoreRolesPermission')->name('role.permission.store')->middleware('permission:all.role.permission.menu');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission')->middleware('permission:all.role.permission.menu');
        Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles')->middleware('permission:all.role.permission.menu');
        Route::post('/role/permission/update/{id}','RolePermissionUpdate')->name('role.permission.update')->middleware('permission:all.role.permission.menu');
        Route::get('/admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles')->middleware('permission:all.role.permission.menu');
    });

    /// Admin User All Route 
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/admin','AllAdmin')->name('all.admin')->middleware('permission:all.role.permission.menu');
        Route::get('/admin/admin','AddAdmin')->name('addd.admin')->middleware('permission:all.role.permission.menu');
        Route::post('/store/admin','StoreAdmin')->name('admin.store')->middleware('permission:all.role.permission.menu');
        Route::get('/edit/admin/{id}','EditAdmin')->name('edit.admin')->middleware('permission:all.role.permission.menu');
        Route::post('/update/admin','UpdateAdmin')->name('admin.update')->middleware('permission:all.role.permission.menu');
        Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete.admin')->middleware('permission:all.role.permission.menu');
        
    });

    /// Admin User All Route 
    Route::controller(CustomerController::class)->group(function(){
        Route::get('/all/customer','AllCustomer')->name('all.customer');
        Route::get('/add/customer','AddCustomer')->name('add.customer');
        Route::post('/store/customer','StoreCustomer')->name('customer.store');
        Route::get('/edit/customer/{id}','EditCustomer')->name('edit.customer');
        Route::post('/update/customer','UpdateCustomer')->name('customer.update');
        Route::get('/delete/customer/{id}','DeleteCustomer')->name('delete.customer');
        
    });
});

require __DIR__.'/auth.php';
