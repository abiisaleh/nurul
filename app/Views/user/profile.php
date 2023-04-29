<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts" class="section">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" id="form">
                            <div class="form-body">
                                <div class="row">
                                    <input type="text" name="fk_user" value="<?= user_id(); ?>" hidden>
                                    <div class="col-md-4">
                                        <label for="inputnama">Nama</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="inputnama" class="form-control" name="nama" placeholder="-" value="<?= (!empty($user)) ? $user['nama'] : '' ?>" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputjeniskelamin">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="form-select" name="jenis_kelamin" id="inputjeniskelamin">
                                            <option>-</option>
                                            <option <?= (!empty($user) && $user['jenis_kelamin'] == 'Pria') ? 'selected' : '' ?>>Pria</option>
                                            <option <?= (!empty($user) && $user['jenis_kelamin'] == 'Wanita') ? 'selected' : '' ?>>Wanita</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputalamat">Alamat</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="inputalamat" class="form-control" name="alamat" placeholder="-" value="<?= (!empty($user)) ? $user['alamat'] : '' ?>" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputtelp">Telp</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="inputtelp" class="form-control" name="telp" placeholder="-" value="<?= (!empty($user)) ? $user['telp'] : '' ?>" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputtanggallahir">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="date" id="inputtanggallahir" class="form-control" name="tanggal_lahir" value="<?= (!empty($user)) ? $user['tanggal_lahir'] : '' ?>" />
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Simpan
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->endsection('content'); ?>

<?php $this->section('script'); ?>
<script>
    //Tambah Data
    $('#form').submit(function(e) {
        e.preventDefault()
        $.ajax({
            url: 'admin/masyarakat/save',
            type: 'POST',
            data: $(this).serialize(),
            success: function() {
                alert('data berhasil disimpan')
            }
        })
    })
</script>
<?php $this->endsection('script'); ?>