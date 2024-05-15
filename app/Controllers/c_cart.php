<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BarangModel;

class c_cart extends Controller
{
    // Fungsi untuk menampilkan halaman keranjang
    public function index()
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart') ?? [];

        $barangModel = new BarangModel();
        $data['barang'] = [];

        // Ambil data barang dari database dan tambahkan data keranjang
        foreach ($barangModel->findAll() as $barang) {
            $id = $barang['id'];

            // Periksa apakah barang ada di keranjang, jika ada, tambahkan informasi jumlahnya
            if (isset($cart[$id])) {
                $barang['quantity'] = $cart[$id]['quantity'];
                $data['barang'][$id] = $barang;
            }
        }

        return view('v_cart', $data);
    }

    public function add($id)
    {
        $model = new BarangModel();
        $item = $model->find($id);
    
        if ($item && $item['stok'] > 0) {
            $cart = session()->get('cart') ?? [];
    
            // Periksa apakah item sudah ada di dalam keranjang
            if (isset($cart[$id])) {
                // Jika sudah ada, tambahkan jumlahnya
                $cart[$id]['quantity']++;
            } else {
                // Jika belum, tambahkan item baru ke dalam keranjang dengan quantity 1
                $cart[$id] = [
                    'nama' => $item['nama'],
                    'harga' => $item['harga'],
                    'quantity' => 1,
                ];
            }
    
            // Kurangi stok setiap kali item ditambahkan ke dalam keranjang
            $item['stok']--;
    
            // Simpan data keranjang kembali ke session
            session()->set('cart', $cart);
            session()->setFlashdata('success', 'Item added to cart');
        }
    
        return redirect()->to('/v_cart');
    }
    
}
