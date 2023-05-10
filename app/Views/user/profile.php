<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts" class="section">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="api/masyarakat/save" method="POST" id="form">
                            <div class="form-body">
                                <div class="row">
                                    <input type="text" name="fk_user" value="<?= user_id(); ?>" hidden>
                                    <input type="text" name="id" value="<?= empty($user) ? '' : $user['id']; ?>" hidden>
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
                                    <div class="position-relative">
                                        <input type="file" name="avatar" class="basic-filepond image-crop-filepond" image-crop-aspect-ratio="1:1" />
                                        <span class="badge bg-danger position-absolute" style="top: -.5rem; right: 1.4rem">img</span>
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

<?php $this->section('style'); ?>
<link rel="stylesheet" href="assets/extensions/filepond/filepond.css" />
<link rel="stylesheet" href="assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css" />
<?php $this->endsection('style'); ?>

<?php $this->section('script'); ?>
<script src="assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
<script src="assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
<script src="assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
<script src="assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js"></script>
<script src="assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
<script src="assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
<script src="assets/extensions/filepond/filepond.js"></script>
<script src="assets/extensions/toastify-js/src/toastify.js"></script>
<script src="assets/static/js/pages/filepond.js"></script>

<script>
    FilePond.setOptions({
        server: {
            url: window.location.href + '/upload',
            process: {
                url: '',
                method: 'POST',
                withCredentials: false,
                headers: {},
                timeout: 7000,
                onload: function(response) {
                    console.log(response)
                },
                onerror: null,
                ondata: null
            },
            revert: ''
        }
    })
</script>
<?php $this->endsection('script'); ?>