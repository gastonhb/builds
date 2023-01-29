<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArtifactTypeController;
use App\Http\Controllers\ArtifactTypeStatController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CheckArtifactController;
use App\Http\Controllers\CurrentBuildController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\SubstatController;
use App\Http\Controllers\FirebaseController;

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
    return view('welcome');
});

 
Route::get('get-firebase-data', [FirebaseController::class, 'index'])->name('firebase.index');


Route::get('artifact-types/stats', [ArtifactTypeController::class, 'stats'] );
Route::get('check-artifacts/search', [CheckArtifactController::class, 'search']);
Route::get('characters/import', [CharacterController::class, 'import']);
Route::post('characters-upload', [CharacterController::class, 'upload']);

Route::resource('artifact-types', ArtifactTypeController::class);
Route::resource('artifact-types.stats', ArtifactTypeStatController::class);
Route::resource('builds', BuildController::class);
Route::resource('/', CheckArtifactController::class);
Route::resource('characters', CharacterController::class);
Route::resource('current-builds', CurrentBuildController::class);
Route::resource('sets', SetController::class);
Route::resource('stats', StatController::class);
Route::resource('substats', SubstatController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
