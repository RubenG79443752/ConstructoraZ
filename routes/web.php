<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    //Roles
    Route::resource('rols', App\Http\Controllers\RolController::class);

    Route::resource('accesos', App\Http\Controllers\AccesoController::class);
    Route::get('/index_acceso/{user_id}', [App\Http\Controllers\AccesoController::class, 'index_acceso'])->name('index_acceso');
    // rutas password
    Route::get('/password_user', [App\Http\Controllers\UserController::class, 'password_user'])->name('password_user');
    Route::post('/updatepassword_user', [App\Http\Controllers\UserController::class, 'updatepassword_user'])->name('updatepassword_user');

    Route::resource('variables', App\Http\Controllers\VariableController::class);
    Route::resource('pais', App\Http\Controllers\PaiController::class);
    Route::resource('horarios', App\Http\Controllers\HorarioController::class);
    Route::resource('cargos', App\Http\Controllers\CargoController::class);
    Route::resource('empresas', App\Http\Controllers\EmpresaController::class);


    Route::resource('contratacions', App\Http\Controllers\ContratacionController::class);
    Route::resource('personals', App\Http\Controllers\PersonalController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::get('menu_sueldos', [App\Http\Controllers\PlanillaController::class,'menu_sueldos'])->name('menu_sueldos');
    Route::resource('planillas', App\Http\Controllers\PlanillaController::class);

    Route::get('/generar_planilla', [App\Http\Controllers\PlanillaController::class,'generar_planilla'])->name('generar_planilla');
    Route::post('/planilla_generada', [App\Http\Controllers\PlanillaController::class,'planilla_generada'])->name('planilla_generada');
    Route::get('/plani', [App\Http\Controllers\PlanillaController::class,'plani'])->name('plani');

    //obtener datos de personal
    Route::post('/obtener_personal', [App\Http\Controllers\PlanillaController::class,'obtener_personal'])->name('obtener_personal');
    //Boletas
    Route::get('/boletas', [App\Http\Controllers\PlanillaController::class,'boletas'])->name('boletas');
    Route::post('/generar_boletas', [App\Http\Controllers\PlanillaController::class,'generar_boletas'])->name('generar_boletas');

    // Lugar trabajo
    Route::resource('lugartrabajos', App\Http\Controllers\LugartrabajoController::class);

    // Asistencia
    Route::get('menu_asistencia', [App\Http\Controllers\AsistenciaController::class,'menu_asistencia'])->name('menu_asistencia');
    Route::resource('asistencias', App\Http\Controllers\AsistenciaController::class);
    Route::get('lista_asistenciaOff', [App\Http\Controllers\AsistenciaController::class,'lista_asistenciaOff'])->name('lista_asistenciaOff');
    Route::get('index_asistenciaOff', [App\Http\Controllers\AsistenciaController::class,'index_asistenciaOff'])->name('index_asistenciaOff');
    Route::post('asistenciaOff', [App\Http\Controllers\AsistenciaController::class,'asistenciaOff'])->name('asistenciaOff');
    Route::post('edit_asistenciaOff', [App\Http\Controllers\AsistenciaController::class,'edit_asistenciaOff'])->name('edit_asistenciaOff');
    /////
    Route::get('index_asistenciaAdmin', [App\Http\Controllers\AsistenciaController::class,'index_asistenciaAdmin'])->name('index_asistenciaAdmin');
    Route::post('asistenciaAdmin', [App\Http\Controllers\AsistenciaController::class,'asistenciaAdmin'])->name('asistenciaAdmin');
    Route::post('edit_asistenciaAdmin', [App\Http\Controllers\AsistenciaController::class,'edit_asistenciaAdmin'])->name('edit_asistenciaAdmin');
    ////
    Route::get('index_nomina', [App\Http\Controllers\AsistenciaController::class,'index_nomina'])->name('index_nomina');
    Route::post('nomina', [App\Http\Controllers\AsistenciaController::class,'nomina'])->name('nomina');

    // formulario 110
    Route::resource('form110s', App\Http\Controllers\Form110Controller::class);
    // Permisos
    Route::resource('permisos', App\Http\Controllers\PermisoController::class);

    // Exportar a Excel
    Route::get('/exportar', [App\Http\Controllers\AsistenciaController::class,'exportar'])->name('exportar');
    Route::post('/exportar_off', [App\Http\Controllers\AsistenciaController::class,'exportar_off'])->name('exportar_off');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Importar excel
    Route::post('/importar', [App\Http\Controllers\AsistenciaController::class,'importar'])->name('importar');
});



