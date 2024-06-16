<?php

namespace App\Http\Controllers;

class NotifikasiController extends Controller {

    public function index(){
        return view ('frontend.dashboard.admin.notifikasi');
    }
}