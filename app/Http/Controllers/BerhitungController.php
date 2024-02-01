<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerhitungController extends Controller
{
    public function hitung() {
        $bill1 = 5;
        $bill2 = 10;
        $hasil = $bill1 + $bill2;
        
        return view('hitung', ['hasil' => $hasil]);
    }
}
