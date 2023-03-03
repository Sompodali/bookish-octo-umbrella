<?php
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\VendorController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\BrandController;



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
Route::get('/',[FrontendController::class, 'index']);

//cartcontroller
Route::post('/add/to/cart',[CartController::class, 'addTOCart']);
Route::get('/checkout',[CartController::class, 'checkOUT']);
Route::post('/cart/product/update/{id}',[CartController::class, 'cartprodUpdate']);
Route::post('/customer/details/order',[CartController::class, 'customerOrder']);
//user
Route::get('/user/register',[FrontendController::class, 'userRegister']);
Route::get('/user/login',[FrontendController::class, 'userLogin']);

//Admincontroller

Route::get('/admin/login/',[AdminController::class, 'adminLogin']);
Route::post('/admin/login/',[AdminController::class, 'adminLoginfrom']);
Route::get('/admin/dashboard/',[AdminController::class, 'adminDashboard']);
Route::get('/admin/logout',[AdminController::class, 'adminLogout']);
//vendor
Route::get('/vendor/register',[VendorController::class, 'vendorRegister']);
Route::get('/vendor/log/',[VendorController::class, 'vendorLog']);

Route::post('/vendor/loging',[VendorController::class, 'vendorLoging']);
Route::post('vendor/registration',[VendorController::class, 'vendorRegistration']);
Route::get('/vendor/dashboard',[VendorController::class, 'vendorDashboard']);
Route::get('/product/create',[VendorController::class, 'vendorProductCreate']);
Route::post('/vendor/product/store',[VendorController::class, 'vendorProductStore']);
Route::get('/vendor/logout',[VendorController::class, 'vendorLogout']);

//productController
Route::get('/vendors',[ProductController::class, 'vendors']);
Route::get('/admin/vendor/approved/{id}',[ProductController::class, 'vendorApproved']);
Route::get('/admin/vendor/pending/{id}',[ProductController::class, 'vendorPending']);
Route::get('/vendor/product/',[ProductController::class, 'vendorProduct']);
Route::get('/vendor/product/approved/{id}',[ProductController::class, 'vendorProductApproved']);
Route::get('/vendor/product/pending/{id}',[ProductController::class, 'vendorProductPending']);

//categorycontroller

Route::get('/category/create/',[CategoryController::class, 'categoryCreate']);
Route::post('/category/store',[CategoryController::class, 'categoryStore']);
Route::get('/category/manage',[CategoryController::class, 'categoryManage']);

Route::get('/category/delete/{id}',[CategoryController::class, 'categoryDelete']);
Route::get('/category/edit/{id}',[CategoryController::class, 'categoryEdit']);
Route::post('/category/update/{id}',[CategoryController::class, 'categoryUpdate']);
//subcategorycreate
Route::get('/subcategory/create/',[SubcategoryController::class, 'subcategoryCreate']);
Route::get('/subcategory/manage/',[SubcategoryController::class, 'subcategoryManage']);
Route::post('/subcategory/store',[SubcategoryController::class, 'subcategoryStore']);
Route::get('/subcategory/delete/{id}',[SubcategoryController::class, 'subcategoryDelete']);
Route::get('/subcategory/edit/{id}',[SubcategoryController::class, 'subcategoryEdit']);
Route::post('/subcategory/update/{id}',[subategoryController::class, 'subcategoryUpdate']);
//Colorcreate
Route::get('/color/create/',[ColorController::class, 'colorCreate']);
Route::post('/color/store/',[ColorController::class, 'colorStore']);
Route::get('/color/manage/',[ColorController::class, 'colorManage']);

Route::get('/color/delete/{id}',[ColorController::class, 'colorDelete']);
Route::get('/color/edit/{id}',[ColorController::class, 'colorEdit']);
Route::post('/color/update/{id}',[ColorController::class, 'colorUpdate']);


//sizecreate
Route::get('/size/create/',[SizeController::class, 'sizeCreate']);
Route::post('/size/store/',[SizeController::class, 'sizeStore']);
Route::get('/size/manage/',[SizeController::class, 'sizeManage']);

//brandcreate
Route::get('/brand/create/',[BrandController::class, 'brandCreate']);
Route::post('/brand/store/',[BrandController::class, 'brandStore']);
Route::get('/brand/manage/',[BrandController::class, 'brandManage']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
