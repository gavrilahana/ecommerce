<?php

namespace App\Controllers;

use App\Models\PenjualanModel;
use App\Models\JualModel;

class c_checkout extends BaseController
{
    protected $penjualanModel;
    protected $jualModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
        $this->jualModel = new JualModel();
    }

    public function create()
    {
        return view('v_checkout');
    }

    public function store()
    {
        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            // Jika keranjang kosong, arahkan kembali ke halaman keranjang dengan pesan kesalahan
            session()->setFlashdata('error', 'Keranjang belanja Anda kosong.');
            return redirect()->to('/v_cart');
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'hp' => $this->request->getPost('hp'),
            'kode_pos' => $this->request->getPost('kode_pos'),
        ];

        // Simpan data penjualan
        $this->penjualanModel->save($data);

        // Dapatkan ID dari penjualan yang baru dibuat
        $penjualanId = $this->penjualanModel->insertID();

        // Simpan data ke tabel jual
        foreach ($cart as $id => $item) {
            $jualData = [
                'penjualan_id' => $penjualanId,
                'barang_id' => $id,
                'jumlah' => $item['quantity'],
                'harga_brg' => $item['harga']
            ];

            $this->jualModel->save($jualData);
        }

        // Hapus data keranjang dari session setelah checkout selesai
        session()->remove('cart');
        session()->setFlashdata('success', 'Data penjualan berhasil ditambahkan.');

        // Arahkan kembali ke halaman keranjang
        return redirect()->to('/v_cart');
    }
}
