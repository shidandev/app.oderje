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

Route::get('/', function () {
    return view('login');
});

Route::get('/img/basic/{filename}', function($filename){
    $path = resource_path() . '/image/basic/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/css/{filename}', function($filename){
    $path = resource_path() . '/css/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'css file not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", 'text/css');

    return $response;
});

Route::get('/js/{filename}', function($filename){
    $path = resource_path() . '/js/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'javascript file not found.'], 404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", 'text/js');

    return $response;
});