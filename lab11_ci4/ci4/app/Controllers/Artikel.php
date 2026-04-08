<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Validation\Validation;

class Artikel extends BaseController
{

    public function index()
    {
        $model = new ArtikelModel();

        $data = [
            'title' => 'Daftar Artikel',
            'artikel' => $model->findAll()
        ];

        return view('artikel/index', $data);
    }

    public function detail($slug)
    {
        $model = new ArtikelModel();

        $artikel = $model->where([
            'slug' => $slug
        ])->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        $data['artikel'] = $artikel;

        return view('artikel/detail', $data);
    }

    public function view($slug)
    {
        $model = new ArtikelModel();

        $artikel = $model->where([
            'slug' => $slug

        ])->first();

        $title = $artikel['judul'];

        return view('artikel/detail', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/admin_index', compact('artikel', 'title'));
    }

    public function tambah()
    {
        return view('artikel/tambah');
    }

    public function simpan()
    {
        $model = new ArtikelModel();

        $slug = url_title($this->request->getPost('judul'), '-', true);

        $model->insert([
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => $slug,
            'status' => 1
        ]);

        return redirect()->to('/artikel');
    }
    public function update($id)
    {
        $model = new ArtikelModel();

        $slug = url_title($this->request->getPost('judul'), '-', true);

        $model->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => $slug,
            'status' => 1
        ]);

        return redirect()->to('/artikel');
    }

    public function delete($id)
    {
        $model = new ArtikelModel();

        $model->delete($id);

        return redirect()->to('/artikel');
    }
    public function add()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
            ]);
            return redirect('admin/artikel');
        }
        $title = "Tambah Artikel";
        return view('artikel/add', compact('title'));
    }
    public function edit($id)
    {
        $artikel = new ArtikelModel();
        // validasi data.
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $artikel->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
            ]);
            return redirect('admin/artikel');
        }
        // ambil data lama
        $data = $artikel->where('id', $id)->first();
        $title = "Edit Artikel";
        return view('artikel/edit', compact('title', 'data'));
    }
}