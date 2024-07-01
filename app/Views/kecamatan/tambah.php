<?php
// Memanggil tampilan header
echo view('header');

// Memanggil tampilan sidebar
echo view('sidebar');
?>

<main class="col-10 ms-sm-auto px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <h1 class="h4">Tambah Data Kecamatan</h1>
    </div>
    
    <?php echo form_open('simpankecamatan') ?>
    
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Kabupaten</label>
                <?php
                // Menampilkan dropdown kabupaten
                echo form_dropdown('id_kabupaten', $kabupatenOptions, '', 'class="form-control"');
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kode Kecamatan</label>
                <?php
                // Menyiapkan atribut input untuk kode kecamatan
                $kode_kecamatan = [
                    'name' => 'kode_kecamatan',
                    'type' => 'number',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Kode Kecamatan',
                    'required' => 'required'
                ];
                // Menampilkan input kode kecamatan
                echo form_input($kode_kecamatan);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nama Kecamatan</label>
                <?php
                // Menyiapkan atribut input untuk nama kecamatan
                $nama_kecamatan = [
                    'name' => 'nama_kecamatan',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Nama Kecamatan',
                    'required' => 'required'
                ];
                // Menampilkan input nama kecamatan
                echo form_input($nama_kecamatan);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Jumlah Penduduk</label>
                <?php
                // Menyiapkan atribut input untuk jumlah penduduk
                $jumlah_penduduk = [
                    'name' => 'jumlah_penduduk',
                    'type' => 'number',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Jumlah Penduduk',
                    'required' => 'required'
                ];
                // Menampilkan input jumlah penduduk
                echo form_input($jumlah_penduduk);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Luas Wilayah</label>
                <?php
                // Menyiapkan atribut input untuk luas wilayah
                $luas_wilayah = [
                    'name' => 'luas_wilayah',
                    'type' => 'number',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Luas Wilayah',
                    'required' => 'required'
                ];
                // Menampilkan input luas wilayah
                echo form_input($luas_wilayah);
                ?>
            </div>
            
            <div>
                <?php
                // Menyiapkan atribut tombol simpan
                $simpan = [
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary'
                ];
                // Menampilkan tombol simpan
                echo form_button($simpan);
                // Menampilkan tombol batal
                echo anchor('kecamatan', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    
    <?php echo form_close(); ?>
</main>

<?php 
// Memanggil tampilan footer
echo view('footer'); 
?>
