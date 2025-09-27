<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function index($number)
    // {
    //     // Variabel $result dibuat di sini
    //     $result = $number + 10; // Atau $number * 10, sesuai logika Anda.

    //     // Variabel $result dilempar ke view menggunakan compact()
    //     return view('product', compact('result'));
    // }
    
    public function index()
    {
        $nama = 'Mahasiswa Unsika';
        return view('produk', ['nama' => $nama, 'alertMessage' =>
        'selamat belajar blade', 'alertType' => 'succes']);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view(view:'barang', data:['isi_data'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}