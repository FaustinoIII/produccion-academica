<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdminUserController;

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

Route::get('/', [HomeController::class,'index']);
Route::get('/log', [HomeController::class,'log']);

//Rutas de administrador
Route::get('/logout', [SuperAdminController::class,'logout']);
Route::get('/admin', [AdminController::class,'index']);
Route::post('/admin-dashboard', [AdminController::class,'dashboard']); //verifica sesion antes de cargar dashboard dmin.admin
Route::get('/dashboard', [SuperAdminController::class,'index']);
Route::get('/admin_art', [SuperAdminController::class,'articulos']);
Route::get('/all-users', [AdminController::class,'all_users']);
Route::get('/delete-user/{id_usuario}', [AdminController::class,'delete_user']);
Route::get('/set-user-to-admin/{id_usuario}', [AdminController::class,'set_user_to_admin']);
Route::get('/set-user-to-normal/{id_usuario}', [AdminController::class,'set_user_to_normal']);

//Rutas del usuario normal
Route::get('/login-user',[UserController::class,'login_check']);
Route::post('/user-registration',[UserController::class,'user_registration']);
Route::post('/user-login', [UserController::class,'user_login']);
Route::get('/user-logout', [UserController::class,'user_logout']);
Route::get('/dashboard-user', [SuperAdminUserController::class,'index_user']);
Route::post('/admin-dashboard-user', [AdminUserController::class,'dashboard_user']);
Route::get('/manage-user-profile', [UserController::class,'manage_user_profile']);
Route::post('/update-user-profile/{id_usuario}', [UserController::class,'update_user_profile']);
Route::get('/registro', [UserController::class,'registro']);

//Rutas articulos
Route::get('/add-article', [ArticulosController::class,'index_art']);
Route::get('/all-articles', [ArticulosController::class,'all_articles']);
Route::post('/save-article', [ArticulosController::class,'save_articles']);
Route::get('/edit-article/{articulo_id}', [ArticulosController::class,'edit_articles']);
Route::post('/update-article/{articulo_id}', [ArticulosController::class,'update_articles']);
Route::get('/delete-article/{articulo_id}', [ArticulosController::class,'delete_articles']);
Route::get('/download-article/{articulo_id}', [ArticulosController::class,'descargar']);


/* 
Route::get('/', [HomeController::class,'index']);

Route::get('login', [LoginController::class,'login']);

Route::get('login_admin', [LoginController::class,'login_admin']);

Route::get('registro', function () {
    return view('registro');
});

Route::get('admin', function () {
    return view('admin/admin');
});

Route::get('admin_usuarios',[AdminController::class,'admin_usuarios']);

Route::get('admin/articulos',[AdminController::class,'admin_art']);


Route::get('articulos', [ArticulosController::class,'articulos']);

Route::get('articulos/registrar', [ArticulosController::class,'registrar']);

Route::get('articulos/{articulo}', [ArticulosController::class,'show']);

Route::get('usuario',[UsuarioController::class,'user']);
Route::get('registrar',[UsuarioController::class,'registrar']);

*/