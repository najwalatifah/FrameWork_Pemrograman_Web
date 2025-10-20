<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        // $nama = 'Mahasiswa Unsika';
        // return view('produk', ['nama' => $nama, 'alertMessage' =>
        // 'selamat belajar blade', 'alertType' => 'succes']);
        $data = Product::all();
        return view('produk.index', compact('data'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master-data.product-master.create-product");
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Proses simpan data kedalam database
        Product::create($request->all());
        return redirect()->back()->with('success','Product created successfully!');
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($nilai)
    {
        // return view(view:'barang', data:['isi_data'=>$id]);
        // Cek ganjil / genap
        // Pastikan numeric agar operasi % aman
        // Pastikan nilai angka
        $nilai = (int) $nilai;

        // Cek ganjil/genap
        if ($nilai % 2 == 0) {
            $type = 'success';
            $message = "Nilai ini adalah genap.";
        } else {
            $type = 'warning';
            $message = "Nilai ini adalah ganjil.";
        }

        // Kirim data ke view
        return view('produk', compact('type', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Product::find($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}