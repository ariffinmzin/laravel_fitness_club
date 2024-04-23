<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    //
    var $pengguna = [
        ['nama' => 'Budi', 'umur' => 22, 'alamat' => 'Bandung'],
        ['nama' => 'Didi', 'umur' => 21, 'alamat' => 'Jakarta'],
        ['nama' => 'Hadi', 'umur' => 19, 'alamat' => 'Bogor'],
    ];
    public function index($id)
    {

        $pengguna = null;
        if (isset($this->pengguna[$id])) {
            $pengguna = $this->pengguna[$id];
            return view('pengguna', compact('pengguna'));
            // echo "<h1>Maklumat Pengguna</h1>";
            // echo "<pre>";
            // var_dump($pengguna);
            // echo "</pre>";
        } else {
            abort(404);
        }
    }
}
