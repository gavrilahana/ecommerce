<?php

namespace App\Controllers;

use App\Models\BarangModel;

class c_barang extends BaseController
{
    public function index()
    {
        $model = new BarangModel();
        $data['barang'] = $model->findAll();

        return view('v_barang', $data);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store()
    {
        $model = new BarangModel();

        $data = [
            'foto' => $this->request->getPost('foto'),
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        if ($model->insert($data) === false) {
            return redirect()->back()->with('errors', $model->errors());
        }

        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $model = new BarangModel();
        $data['barang'] = $model->find($id);

        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $model = new BarangModel();

        $data = [
            'foto' => $this->request->getPost('foto'),
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        if ($model->update($id, $data) === false) {
            return redirect()->back()->with('errors', $model->errors());
        }

        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $model = new BarangModel();
        $model->delete($id);

        return redirect()->to('/barang');
    }


}
