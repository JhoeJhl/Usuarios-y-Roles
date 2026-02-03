<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {

    /*FORMA DE HACER CONSULTAS A LAS BASE DE DATOS
    CHUNK: TRAE EL NUMERO REQUERIDO DE DATOS PARA NO SATURAR LA MEMORIA 
    CHUNKBYID: HACE LO MISMO PERO SE USA PARA MAS DATOS */


    // $usuarios = DB::table('users')
    //             ->orderBy('id')
    //             ->chunkById(10, function ($users) {
    //                 foreach($users as $user){
    //                     echo $user->id . ' ' . $user->name . '<br>';
    //                 }
    //             });
    // return $usuarios;

    // foreach (DB::table('users')->lazyById() as $user) {
    //     echo $user->name . '<br>';
    // }
    $users = DB::table('users')->selectRaw('AVG(id) as promedio_id, MAX(id) as max_id, MIN(id) as min_id')->first(); 
    foreach($users as $user){
        echo $user . '<br>';
    }

    // return DB::table('profiles')
    //         ->select('id', 'phone as Numero_Celular', 'created_at')
    //         ->selectRaw('CONCAT(address, " | ", birth_date ) as date_profile')
    //         ->whereRaw('id >= 3 AND id <=7')
    //         ->get();

    // return DB::table('users')
    //     ->join('profiles', 'users.id', '=', 'profiles.user_id')
    //     ->select('users.id', 'profiles.phone')  
    //     ->get();
});
