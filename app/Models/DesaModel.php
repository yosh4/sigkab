<?php
namespace App\Models;
use CodeIgniter\Model;
class desaModel extends Model
{
    protected $table = 'desa'; // nama tabel
    protected $primaryKey = 'kode_desa'; // primary key tabel
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $useAutoIncrement = false;
    // nama semua field pada tabel
    protected $allowedFields =['kode_desa','kode_kecamatan','nama_desa','alamat_desa','koordinat'];
    protected $skipValidation = true;
}

