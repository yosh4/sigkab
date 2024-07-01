<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\KecamatanModel;

class Kecamatan extends BaseController {
    
    // Method index yang memanggil method tampil
    public function index() {
        $this->tampil();
    }

    // Method untuk menampilkan data kecamatan
    public function tampil() {
        $kecamatan = new KecamatanModel();
        // Mengambil semua data di tabel kecamatan
        $data['query'] = $kecamatan->findAll();
        // Mengambil nilai variabel msg pada session flashdata
        $data['msg'] = session()->getFlashdata('msg');
        // Memanggil file view tampil
        echo view('kecamatan/tampil', $data);
    }

    // Method untuk menampilkan form tambah kecamatan
    public function tambah() {
        $kabupaten = new KabupatenModel();
        $kabupaten = $kabupaten->findAll();
        $kabupatenOptions = array();
        // Mempersiapkan variabel array
        $kabupatenOptions[''] = 'belum dipilih';
        // Perulangan untuk menghasilkan option value di dropdown kabupaten
        foreach ($kabupaten as $row) {
            $kabupatenOptions[$row->id_kabupaten] = strtoupper($row->nama_kabupaten);
        }
        // Variabel untuk list dropdown kabupaten
        $data['kabupatenOptions'] = $kabupatenOptions;
        // Memanggil view form tambah
        return view('kecamatan/tambah', $data);
    }

    // Method untuk menampilkan form edit kecamatan
    public function edit($kode_kecamatan) {
        $kabupaten = new KabupatenModel();
        $kabupaten = $kabupaten->findAll();
        $kabupatenOptions = array();
        $kabupatenOptions[''] = 'belum dipilih';
        foreach ($kabupaten as $row) {
            $kabupatenOptions[$row->id_kabupaten] = strtoupper($row->nama_kabupaten);
        }
        $data['kabupatenOptions'] = $kabupatenOptions;
        $kecamatan = new KecamatanModel();
        // Mengambil data kecamatan sesuai nilai pada $kode_kecamatan
        $data['query'] = $kecamatan->find($kode_kecamatan);
        // Mengirimkan id yang berisi nilai $kode_kecamatan
        // sebagai acuan untuk update data di method update()
        $data['id'] = $kode_kecamatan;
        return view('kecamatan/edit', $data);
    }

    // Method untuk menyimpan data kecamatan baru
    public function simpan() {
        $kecamatan = new KecamatanModel();
        // Mengambil data dari masing-masing input pada form tambah
        // dan disimpan pada array untuk disimpan ke tabel kecamatan
        $data_kecamatan = [
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
            'luas_wilayah' => $this->request->getVar('luas_wilayah')
        ];
        // Menggunakan query builder insert untuk menyimpan ke tabel kecamatan
        $kecamatan->insert($data_kecamatan);
        // Method affectedRows() mengembalikan nilai 1 jika insert berhasil, nilai 0 jika gagal
        if ($kecamatan->affectedRows() > 0) {
            // Persiapkan pesan jika insert berhasil
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            // Persiapkan pesan jika insert gagal
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        // Mengirimkan nilai msg melalui flashdata (session sekali pakai)
        session()->setFlashdata('msg', $msg);
        // Memanggil index pada controller kecamatan agar setelah simpan, tampilan kembali ke tabel CRUD
        return redirect()->to('kecamatan');
    }

    // Method untuk mengupdate data kecamatan
    public function update() {
        $kecamatan = new KecamatanModel();
        // Mengambil input hidden id dari form edit
        $id = $this->request->getVar('id');
        $data_kecamatan = [
            'kode_kecamatan' => $this->request->getVar('kode_kecamatan'),
            'id_kabupaten' => $this->request->getVar('id_kabupaten'),
            'nama_kecamatan' => $this->request->getVar('nama_kecamatan'),
            'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
            'luas_wilayah' => $this->request->getVar('luas_wilayah')
        ];
        // Menggunakan query builder update untuk mengubah data di tabel kecamatan berdasarkan id (kode kecamatan)
        $kecamatan->update($id, $data_kecamatan);
        if ($kecamatan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil disimpan!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
    }

    // Method untuk menghapus data kecamatan
    public function hapus($kode_kecamatan) {
        $kecamatan = new KecamatanModel();
        // Menggunakan query builder delete untuk menghapus data di tabel kecamatan sesuai kode kecamatan
        $kecamatan->delete(['kode_kecamatan' => $kode_kecamatan]);
        if ($kecamatan->affectedRows() > 0) {
            $msg = '<div class="alert alert-primary" role="alert">Data berhasil dihapus!</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>';
        }
        session()->setFlashdata('msg', $msg);
        return redirect()->to('kecamatan');
    }
}
?>
