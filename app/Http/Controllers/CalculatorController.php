<?php

namespace App\Http\Controllers;

use App\Models\Calculate;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    //menampilkan index
    public function index()
    {
        $hasil = null;
        return view('index', compact('hasil'));
    }

    //menampilkan index dengan default riwayat
    public function indexHasil($data)
    {
        $hasil = $data;

        return view('index', compact('hasil'));
    }

    //menyimpan ke database
    public function store(Request $request)
    {
        Calculate::create([
            'syntax' => $request->syntax,
            'result' => $request->result
        ]);
        echo 'data berhasil ditambahkan';
    }

    //menampilkan riwayat
    public function show()
    {
        $datas = Calculate::orderBy('id', 'desc')->get();
        return view('history', compact('datas'));
    }
}
