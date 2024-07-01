<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\DesaModel;

class Desa extends BaseController {
    
    // Method index yang memanggil method tampil
    public function index() {
        $this->tampil();
    }

    // Method untuk menampilkan data desa
    public function tampil() {
        $desa = new DesaModel();
        // Mengambil semua data di tabel desa dan kecamatan menggunakan JOIN
        $data['query'] = $desa->join('kecamatan', 'kecamatan.kode_kecamatan = desa.kode_kecamatan')->findAll();
        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');
        // Memanggil file view tampil
        echo view('desa/tampil', $data);
    }

    // Method untuk menampilkan form tambah desa
    public function tambah() {
        $kecamatan = new KecamatanModel();
        $kecamatan = $kecamatan->findAll();
        $kecamatanOptions = array();
        // Mempersiapkan variabel array
        $kecamatanOptions[''] = 'belum dipilih';
        // Perulangan untuk menghasilkan option value di dropdown kecamatan
        foreach ($kecamatan as $row) {
            $kecamatanOptions[$row->kode_kecamatan] = strtoupper($row->nama_kecamatan);
        }
        // Variabel untuk list dropdown kecamatan
        $data['kecamatanOptions'] = $kecamatanOptions;
        // Memanggil view form tambah
        return view('desa/tambah', $data);
    }

    // Method untuk menampilkan form edit desa
    public function edit($kode_desa) {
        $kecamatan = new KecamatanModel();
        $kecamatan = $kecamatan->findAll();
        $kecamatanOptions = array();
        $kecamatanOptions[''] = 'belum dipilih';
        foreach ($kecamatan as $row) {
            $kecamatanOptions[$row->kode_kecamatan] = strtoupper($row->nama_kecamatan);
        }
        $data['kecamatanOptions'] = $kecamatanOptions;
        $desa = new DesaModel();
        // Mengambil data desa sesuai nilai pada $kode_desa
        $data['query'] = $desa->find($kode_desa);
        // Mengirimkan id yang berisi nilai $kode_desa sebagai acuan untuk update data di method update()
        $data['id'] = $kode_desa;
        return view('desa/edit', $data);
    }

    // Method untuk menyimpan data desa baru
    public function simpan() {
        $desa = new DesaModel();
        // Mengambil data dari masing-masing input pada form tambah
        // dan disimpan pada array untuk disimpan ke tabel desa
        $data_desa = [
            'kode_desa' => $this->request->getVar('kode_desa'),
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'nama_desa' => $this->request->getVar('nama_desa'),
            'alamat_desa' => $this->request->getVar('alamat_desa'),
            'koordinat' => $this->request->getVar('koordinat')
        ];
        // Menggunakan query builder insert untuk menyimpan ke tabel desa
        $desa->insert($data_desa);
        // Method affectedRows() mengembalikan nilai 1 jika insert berhasil, nilai 0 jika gagal
        if ($desa->affectedRows() > 0) {
            // Persiapkan pesan jika insert berhasil
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            // Persiapkan pesan jika insert gagal
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        // Mengirimkan nilai msg melalui flashdata (session sekali pakai)
        session()->setFlashdata('msg', $msg);
        // Memanggil index pada controller desa agar setelah simpan, tampilan kembali ke tabel CRUD
        return redirect()->to('desa');
    }

    // Method untuk mengupdate data desa
    public function update() {
        $desa = new DesaModel();
        // Mengambil input hidden id dari form edit
        $id = $this->request->getVar('id');
        $data_desa = [
            'kode_desa' => $this->request->getVar('kode_desa'),
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'nama_desa' => $this->request->getVar('nama_desa'),
            'alamat_desa' => $this->request->getVar('alamat_desa'),
            'koordinat' => $this->request->getVar('koordinat')
        ];
        // Menggunakan query builder update untuk mengubah data di tabel desa berdasarkan id (kode_desa)
        $desa->update($id, $data_desa);
        if ($desa->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('desa');
    }

    // Method untuk menghapus data desa
    public function hapus($kode_desa) {
        $desa = new DesaModel();
        // Menggunakan query builder delete untuk menghapus data di tabel desa sesuai kode_desa
        $desa->delete(['kode_desa' => $kode_desa]);
        if ($desa->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('desa');
    }
}
?>
