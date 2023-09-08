<?php

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


/*
|--------------------------------------------------------------------------
| Peticiones (Con Ajax)
|--------------------------------------------------------------------------
*/

Route::get('ajax/incentives', 'AjaxController@getIncentives');


/*
|--------------------------------------------------------------------------
| Rutas Backend (Con logín)
|--------------------------------------------------------------------------
*/

// Panel de control
Route::get('panel', 'Backend\BackendController@index')->name('backend.index');

// Gestión de convocatorias
Route::get('panel/convocatorias', 'Backend\CallsController@index')->name('backend.calls.index');
Route::get('panel/convocatorias/crear', 'Backend\CallsController@create')->name('backend.calls.create');
Route::post('panel/convocatorias/storage', 'Backend\CallsController@storage')->name('backend.calls.storage');
Route::get('panel/convocatorias/{id}/editar', 'Backend\CallsController@edit')->name('backend.calls.edit');
Route::put('panel/convocatorias/{id}', 'Backend\CallsController@update')->name('backend.calls.update');
Route::delete('panel/convocatorias/{id}', 'Backend\CallsController@destroy')->name('backend.calls.destroy');

// Gestión de usuarios
Route::get('panel/usuarios', 'Backend\UsersController@index')->name('backend.users.index');
Route::get('panel/usuarios/crear', 'Backend\UsersController@create')->name('backend.users.create');
Route::post('panel/usuarios/storage', 'Backend\UsersController@storage')->name('backend.users.storage');
Route::get('panel/usuarios/{id}/editar', 'Backend\UsersController@edit')->name('backend.users.edit');
Route::put('panel/usuarios/{id}', 'Backend\UsersController@update')->name('backend.users.update');
Route::delete('panel/usuarios/{id}', 'Backend\UsersController@destroy')->name('backend.users.destroy');

// Gestión de roles
Route::get('panel/roles', 'Backend\RolesController@index')->name('backend.roles.index');
Route::get('panel/roles/crear', 'Backend\RolesController@create')->name('backend.roles.create');
Route::post('panel/roles/storage', 'Backend\RolesController@storage')->name('backend.roles.storage');
Route::get('panel/roles/{id}/editar', 'Backend\RolesController@edit')->name('backend.roles.edit');
Route::put('panel/roles/{id}', 'Backend\RolesController@update')->name('backend.roles.update');
Route::delete('panel/roles/{id}', 'Backend\RolesController@destroy')->name('backend.roles.destroy');

// Gestión de permisos
Route::get('panel/permisos', 'Backend\PermissionsController@index')->name('backend.permissions.index');

// Gestión de estímulos
Route::get('panel/estimulos', 'Backend\IncentivesController@index')->name('backend.incentives.index');
Route::get('panel/estimulos/crear/{id}', 'Backend\IncentivesController@create')->name('backend.incentives.create');
Route::post('panel/estimulos/storage', 'Backend\IncentivesController@storage')->name('backend.incentives.storage');
Route::get('panel/estimulos/{id}/editar', 'Backend\IncentivesController@edit')->name('backend.incentives.edit');
Route::put('panel/estimulos/{id}', 'Backend\IncentivesController@update')->name('backend.incentives.update');
Route::delete('panel/estimulos/{id}', 'Backend\IncentivesController@destroy')->name('backend.incentives.destroy');
Route::get('panel/estimulos/selectTypeUser', 'Backend\IncentivesController@selectTypeUser');




// Gestion de criterios
Route::get('panel/criteria', 'Backend\CriteriaController@index')->name('backend.criteria.index');
Route::post('panel/criteria', 'Backend\CriteriaController@show')->name('backend.criteria.show');
Route::post('panel/criteria/crear', 'Backend\CriteriaController@create')->name('backend.criteria.create');
Route::delete('panel/criteria/{id}', 'Backend\CriteriaController@destroy')->name('backend.criteria.destroy');

// Tipos de estímulo
Route::get('panel/tipos-de-estimulo', 'Backend\IncentiveTypesController@index')->name('backend.incentiveTypes.index');
Route::get('panel/tipos-de-estimulo/crear', 'Backend\IncentiveTypesController@create')->name('backend.incentiveTypes.create');
Route::post('panel/tipos-de-estimulo/storage', 'Backend\IncentiveTypesController@storage')->name('backend.incentiveTypes.storage');
Route::get('panel/tipos-de-estimulo/{id}/editar', 'Backend\IncentiveTypesController@edit')->name('backend.incentiveTypes.edit');
Route::put('panel/tipos-de-estimulo/{id}', 'Backend\IncentiveTypesController@update')->name('backend.incentiveTypes.update');
Route::delete('panel/tipos-de-estimulo/{id}', 'Backend\IncentiveTypesController@destroy')->name('backend.incentiveTypes.destroy');

// Áreas
Route::get('panel/areas', 'Backend\AreasController@index')->name('backend.areas.index');
Route::get('panel/areas/crear', 'Backend\AreasController@create')->name('backend.areas.create');
Route::post('panel/areas/storage', 'Backend\AreasController@storage')->name('backend.areas.storage');
Route::get('panel/areas/{id}/editar', 'Backend\AreasController@edit')->name('backend.areas.edit');
Route::put('panel/areas/{id}', 'Backend\AreasController@update')->name('backend.areas.update');
Route::delete('panel/areas/{id}', 'Backend\AreasController@destroy')->name('backend.areas.destroy');

// Líneas de acción
Route::get('panel/lineas-de-accion', 'Backend\LinesActionController@index')->name('backend.linesAction.index');
Route::get('panel/lineas-de-accion/crear', 'Backend\LinesActionController@create')->name('backend.linesAction.create');
Route::post('panel/lineas-de-accion/storage', 'Backend\LinesActionController@storage')->name('backend.linesAction.storage');
Route::get('panel/lineas-de-accion/{id}/editar', 'Backend\LinesActionController@edit')->name('backend.linesAction.edit');
Route::put('panel/lineas-de-accion/{id}', 'Backend\LinesActionController@update')->name('backend.linesAction.update');
Route::delete('panel/lineas-de-accion/{id}', 'Backend\LinesActionController@destroy')->name('backend.linesAction.destroy');

// Formularios
Route::get('panel/formularios', 'Backend\FormsController@index')->name('backend.forms.index');
Route::get('panel/formularios/crear', 'Backend\FormsController@create')->name('backend.forms.create');
Route::post('panel/formularios/storage', 'Backend\FormsController@storage')->name('backend.forms.storage');
Route::get('panel/formularios/{id}/editar', 'Backend\FormsController@edit')->name('backend.forms.edit');
Route::put('panel/formularios/{id}', 'Backend\FormsController@update')->name('backend.forms.update');
Route::delete('panel/formularios/{id}', 'Backend\FormsController@destroy')->name('backend.forms.destroy');

// Formularios
Route::get('panel/formularios/campos', 'Backend\FieldsController@index')->name('backend.fields.index');
Route::get('panel/formularios/campos/crear', 'Backend\FieldsController@create')->name('backend.fields.create');
Route::post('panel/formularios/campos/storage', 'Backend\FieldsController@storage')->name('backend.fields.storage');
Route::get('panel/formularios/campos/{id}/editar', 'Backend\FieldsController@edit')->name('backend.fields.edit');
Route::put('panel/formularios/campos/{id}', 'Backend\FieldsController@update')->name('backend.fields.update');
Route::delete('panel/formularios/campos/{id}', 'Backend\FieldsController@destroy')->name('backend.fields.destroy');

// Tipos de usuario
Route::get('panel/tipos-de-usuario', 'Backend\UserTypesController@index')->name('backend.userTypes.index');
Route::post('panel/tipos-de-usuario', 'Backend\UserTypesController@index')->name('backend.userTypes.index');
Route::get('panel/tipos-de-usuario/crear', 'Backend\UserTypesController@create')->name('backend.userTypes.create');
Route::post('panel/tipos-de-usuario/storage', 'Backend\UserTypesController@storage')->name('backend.userTypes.storage');
Route::get('panel/tipos-de-usuario/{id}/editar', 'Backend\UserTypesController@edit')->name('backend.userTypes.edit');
Route::put('panel/tipos-de-usuario/{id}', 'Backend\UserTypesController@update')->name('backend.userTypes.update');
Route::delete('panel/tipos-de-usuario/{id}', 'Backend\UserTypesController@destroy')->name('backend.userTypes.destroy');

// Gestión de aplicaciones
Route::get('panel/aplicaciones', 'Backend\ApplicationsController@index')->name('backend.applications.index');
Route::get('panel/export-aplicaciones', 'Backend\ApplicationsController@export')->name('backend.applications.export');
Route::get('panel/aplicaciones/{id}', 'Backend\ApplicationsController@show')->name('backend.applications.show');
Route::get('panel/aplicaciones/grade/{id}', 'Backend\ApplicationsController@grade')->name('backend.applications.grade');
// Route::post('panel/aplicaciones/storage', 'Backend\ApplicationsController@storage')->name('backend.aplications.storage');
Route::get('panel/aplicaciones/{id}/editar', 'Backend\ApplicationsController@edit')->name('backend.applications.edit');
Route::put('panel/aplicaciones/{id}', 'Backend\ApplicationsController@update')->name('backend.applications.update');
Route::delete('panel/aplicaciones/{id}', 'Backend\ApplicationsController@destroy')->name('backend.applications.destroy');

// Mis aplicaciones
Route::get('panel/calificar-aplicaciones', 'Backend\GradeApplicationsController@index')->name('backend.gradeApplications.index');
Route::get('panel/calificar-aplicaciones/{id}', 'Backend\GradeApplicationsController@show')->name('backend.gradeApplications.show');
Route::get('panel/calificar-aplicaciones/edit/{id}', 'Backend\GradeApplicationsController@edit')->name('backend.gradeApplications.edit');
Route::post('panel/calificar-aplicaciones/calificar', 'Backend\GradeApplicationsController@grade')->name('backend.gradeApplications.grade');
Route::post('panel/calificar-aplicaciones/update/{id}', 'Backend\GradeApplicationsController@update')->name('backend.gradeApplications.update');

//}------------------------------------------------------------------------------

// Calificar aplicaciones
Route::get('panel/mis-aplicaciones', 'Backend\MyApplicationsController@index')->name('backend.myAplications.index');
Route::get('panel/mis-aplicaciones/{id}', 'Backend\MyApplicationsController@show')->name('backend.myApplications.show');
Route::get('panel/mis-aplicaciones/grade/{id}', 'Backend\MyApplicationsController@grade')->name('backend.myApplications.grade');

// Jurados
Route::get('panel/jurados', 'Backend\JudgesController@index')->name('backend.judges.index');
Route::get('panel/jurados/asignar/{id}', 'Backend\JudgesController@create')->name('backend.judges.create');
Route::post('panel/jurados/storage', 'Backend\JudgesController@storage')->name('backend.judges.storage');
Route::get('panel/jurados/{id}/editar', 'Backend\JudgesController@edit')->name('backend.judges.edit');
Route::put('panel/jurados/{id}', 'Backend\JudgesController@update')->name('backend.judges.update');

// Notificaciones
Route::get('panel/notificaciones', 'Backend\NotificationController@index')->name('backend.notifications.index');
Route::get('panel/notificaciones/{id}', 'Backend\NotificationController@show')->name('backend.notifications.show');


// Formulario de aplicaciones
Route::get('aplicacion/{incentive_slug}/{userType_slug}', 'Backend\PostulationsController@form')->name('backend.postulations.form');
Route::post('aplicacion/storage', 'Backend\PostulationsController@storage')->name('backend.postulations.storage');
Route::post('aplicacion/postulate', 'Backend\PostulationsController@postulate')->name('backend.postulations.postulate');
Route::post('aplicacion/register-member', 'Backend\PostulationsController@registerMember')->name('backend.postulations.registerMember');
Route::delete('aplicacion/delete-member/{id}', 'Backend\PostulationsController@deleteMember')->name('backend.postulations.deleteMember');

/*
|--------------------------------------------------------------------------
| Rutas frontend (Sin logín)
|--------------------------------------------------------------------------
*/

// Rutas de autenticación
Auth::routes();

// Inicio
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.index');

// Convocatorias
Route::get('convocatorias', 'Frontend\FrontendController@calls')->name('frontend.calls.index');
Route::match(['get', 'post'], 'convocatorias/{slug}', 'Frontend\FrontendController@call')->name('frontend.calls.call');
Route::get('convocatorias/{call_slug}/{incentive_slug}', 'Frontend\FrontendController@incentive')->name('frontend.call.incentive');

// Estímulos
// Route::get('incentivos', 'Frontend\FrontendController@incentives')->name('frontend.incentives.index');
// Route::get('estimulos/{slug}', 'Frontend\FrontendController@incentive')->name('frontend.incentives.incentive');
// 



/**
 * creacion de rutas formularios estimulos
 */

// Formularios
Route::get('panel/estimulos/formularios', 			'Backend\FormsEstimuloController@index')->name('estimulos.forms.index');
Route::get('panel/estimulos/formularios/crear', 		'Backend\FormsEstimuloController@create')->name('estimulos.forms.create');
Route::post('panel/estimulos/formularios/storage', 	'Backend\FormsEstimuloController@storage')->name('estimulos.forms.storage');
Route::get('panel/estimulos/formularios/{id}/editar', 'Backend\FormsEstimuloController@edit')->name('estimulos.forms.edit');
Route::put('panel/estimulos/formularios/{id}', 		'Backend\FormsEstimuloController@update')->name('estimulos.forms.update');
Route::delete('panel/estimulos/formularios/{id}', 	'Backend\FormsEstimuloController@destroy')->name('estimulos.forms.destroy');



Route::get('/clear-cache', function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
});

Route::get('/storage', function () {
   echo Artisan::call('storage:link');
});
