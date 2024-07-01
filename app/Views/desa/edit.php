<?php
// Memanggil tampilan header
echo view('header');

// Memanggil tampilan sidebar
echo view('sidebar');
?>

<main class="col-10 ms-sm-auto px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <h1 class="h4">Edit Data Desa</h1>
    </div>
    
    <?php
    // Membuka form untuk update data desa
    echo form_open('updatedesa');
    ?>
    
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <?php
                // Menyembunyikan input id
                echo form_hidden('id', $id);
                
                // Dropdown untuk memilih kecamatan
                echo form_dropdown('kode_kecamatan', $kecamatanOptions, $query->kode_kecamatan, 'class="form-control"');
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kode Desa</label>
                <?php
                // Input untuk Kode Desa
                $kode_desa = [
                    'name' => 'kode_desa',
                    'type' => 'number',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Kode Desa',
                    'required' => 'required',
                    'value' => $query->kode_desa
                ];
                echo form_input($kode_desa);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nama Desa</label>
                <?php
                // Input untuk nama desa
                $nama_desa = [
                    'name' => 'nama_desa',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Nama Desa',
                    'required' => 'required',
                    'value' => $query->nama_desa
                ];
                echo form_input($nama_desa);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Alamat Desa</label>
                <?php
                // Input untuk alamat desa
                $alamat_desa = [
                    'name' => 'alamat_desa',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Alamat Desa',
                    'required' => 'required',
                    'value' => $query->alamat_desa
                ];
                echo form_input($alamat_desa);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Koordinat Desa</label>
                <?php
                // Input untuk koordinat Desa
                $koordinat = [
                    'name' => 'koordinat',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Contoh : -7.5134,109.0702',
                    'required' => 'required',
                    'value' => $query->koordinat
                ];
                echo form_input($koordinat);
                ?>
            </div>
            
            <div>
                <?php
                // Tombol untuk menyimpan perubahan
                $simpan = [
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary'
                ];
                echo form_button($simpan);
                
                // Tombol untuk membatalkan perubahan
                echo anchor('desa', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    
    <?php
    // Menutup form
    echo form_close();
    ?>
</main>

<?php
// Memanggil tampilan footer
echo view('footer');
?>
