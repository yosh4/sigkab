<?php
namespace App\Controllers;
// menghubungkan file controller dengan model kabupaten
use App\Models\KabupatenModel;
// inisialisasi model kecamatan dan desa
use App\Models\KecamatanModel;
use App\Models\DesaModel;
class Dashboard extends BaseController
{
   // method index otomatis dipanggil oleh controller
   public function index(){
       // inisiasi objek dari class KabupatenModel
       $kabupaten = new KabupatenModel();  
       // ambil data dari tabel kabupaten
       // angka 1 mengacu pada data id_kabupaten di tabel kabupaten
       // artinya mencari data id_kabupaten = 1
       $data['kabupaten'] = $kabupaten->find(1); 
       // menampilkan file views/dashboard.php di browser
       // mengirimkan data kabupaten melalui variabel $data

       // inisiasi object dari class DesaModel
       $desa = new DesaModel();
       // mengambil semua data desa
       $query = $desa->findAll();
       $lokasi = '';
       $label_lokasi='';
       // perulangan untuk mempersiapkan data marker
       foreach ($query as $data_desa) {
           $lokasi .= '["'.$data_desa->kode_desa.'" ,"'.$data_desa->nama_desa.'","'.$data_desa->alamat_desa.'", '.$data_desa->koordinat.'],';
       }
       $data['marker'] = $lokasi;
       echo view('dashboard',$data);
   }
    // function untuk menampilkan data kecamatan
    public function getdata(){
        // inisiasi object dari class KecamatanModel
        $kecamatan = new KecamatanModel();
        // mengambil kode_kecamatan yang dikirim oleh AJAX
        $kode_kecamatan = $this->request->getGet('kode_kecamatan');
        // melakukan pencarian ke tabel kecamatan berdasarkan kode kecamatan
        $data = $kecamatan->find($kode_kecamatan);
        // jika data ditemukan, persiapkan data kecamatan
        if(!empty($data)){
            $hasil = '<tr><td width="45%">Kode Kecamatan</td><td>:</td><td>'.
            $data->kode_kecamatan.'</td></tr>'.
            '<tr><td>Nama Kecamatan</td><td>:</td><td>'.
            $data->nama_kecamatan.'</td></tr>'.
            '<tr><td>Jumlah Penduduk</td><td>:</td><td>'.
            number_format($data->jumlah_penduduk,0,',','.').
            ' Jiwa</td></tr>'.
            '<tr><td>Luas Wilayah</td><td>:</td><td>'.
            number_format($data->luas_wilayah,0,',','.').
            ' Km<sup>2</sup></td></tr>';
        // jika data tidak ditemukan, tampilkan pesan
        }else{
            $hasil = '<tr><td class="text-center" colspan="3">DATA TIDAK ADA !</td></tr>';
        }
        // persiapkan array data
        $respon = ['hasil' => $hasil];
        // kembalikan dalam bentuk JSON
        return $this->response->setJSON($respon);

    }
 }
 