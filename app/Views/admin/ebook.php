<?php $this->extend('layout'); ?>

<?php if (in_groups('admin')) : ?>
  <?php $this->section('tools'); ?>
  <div class="float-start float-sm-end">
    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#modal-add">
      <i class="bi bi-plus"></i> Tambah Data
    </button>
  </div>
  <?php $this->endsection('tools'); ?>
<?php endif ?>

<?php $this->section('content'); ?>
<section class="section">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover" id="tabel"></table>
      </div>
    </div>
  </div>

  <!--Basic Modal -->
  <div class="modal modal-lg fade text-left" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">
            Tambah Data
          </h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
          <form class="form form-horizontal row" enctype="multipart/form-data" id="form-add">
            <div class="col-12 col-md-5">
              <div class="col-12 position-relative">
                <input type="file" name="image" id="inputsampul" class="image-preview-filepond" />
                <span class="badge bg-success position-absolute" style="top: -.5rem; left: -.5rem">img</span>

                <p class="text-center small" for="inputsampul">Upload gambar sampul</p>
              </div>
            </div>
            <div class="col-12 col-md-7">
              <?= csrf_field(); ?>
              <input type="text" id="inputid" name="id" hidden>
              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label for="inputjudul">Judul</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="inputjudul" class="form-control" name="judul" placeholder="-" />
                  </div>

                  <div class="col-md-4">
                    <label for="inputpenulis">Penulis</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="inputpenulis" class="form-control" name="penulis" placeholder="-" />
                  </div>

                  <div class="col-md-4">
                    <label for="inputpenerbit">Penerbit</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="text" id="inputpenerbit" class="form-control" name="penerbit" placeholder="-" />
                  </div>

                  <div class="col-md-4">
                    <label for="inputstok">Stok</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="number" id="inputstok" class="form-control" name="stok" placeholder="-" />
                  </div>

                  <div class="col-md-4">
                    <label for="inputrilis">Rilis</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <input type="date" id="inputrilis" class="form-control" name="rilis" placeholder="-" />
                  </div>

                  <div class="col-md-4">
                    <label for="inputkategori">Kategori</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <fieldset class="form-group">
                      <select class="form-select" id="inputkategori" name="fk_kategori">
                        <option>-</option>
                      </select>
                    </fieldset>
                  </div>

                  <div class="col-md-4">
                    <label for="inputkategori">Waktu Peminjaman</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <fieldset class="form-group">
                      <select class="form-select" id="inputwaktu" name="waktu_peminjaman">
                        <option value="3">3 hari</option>
                        <option value="7">7 hari</option>
                        <option value="14">14 hari</option>
                      </select>
                    </fieldset>
                  </div>

                  <div class="position-relative">
                    <input type="file" name="buku" class="basic-filepond" />
                    <span class="badge bg-danger position-absolute" style="top: -.5rem; right: 1.4rem">pdf</span>
                  </div>

                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                      Submit
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
<link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css" />
<link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css" />
<?php $this->endsection('style'); ?>

<?php $this->section('script'); ?>
<script src="assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="assets/static/js/pages/datatables.js"></script>

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
        timeout: 30000,
        onload: function(response) {
          console.log(response)
        },
        onerror: null,
        ondata: null
      },
      revert: ''
    }
  })

  $.getJSON('admin/kategori/show', function(data) {
    var select = $('#inputkategori')
    $.each(data.data, function(index, value) {
      var option = $("<option/>")

      option.val(value.id)
      option.text(value.nama)
      select.append(option)
    })
  })

  var dataTable = $('#tabel').DataTable({
    responsive: true,
    autoWidth: false,
    processing: true,
    order: [],
    ajax: window.location.href + '/show',
    columns: [{
        "title": "#",
        "data": "kode_id",
      },
      {
        "title": "Judul",
        "data": "judul"
      },
      {
        "title": "Penulis",
        "data": "penulis"
      },
      {
        "title": "Penerbit",
        "data": "penerbit"
      },
      {
        "title": "Rilis",
        "data": "rilis"
      },
      {
        "title": "Kategori",
        "data": "kategori"
      },
      {
        "title": "Stok",
        "data": "sisa",
      },
      {
        "title": "waktu",
        "data": "waktu_peminjaman",
        "render": function(waktu_peminjaman) {
          return waktu_peminjaman + " hari"
        }
      },
      <?php if (in_groups('admin')) : ?> {
          "title": "Aksi",
          "width": 100,
          "data": null,
          "render": function() {
            return "<button class='btn btn-sm btn-danger btnHapus'>Hapus</button> <button class='btn btn-sm btn-warning btnEdit'>Edit</button>"
          }
        },
      <?php endif ?>
    ],
  })

  //Tambah Data
  $('#form-add').submit(function(e) {
    e.preventDefault()
    $.ajax({
      url: window.location.href + '/save',
      type: 'POST',
      data: $(this).serialize(),
      success: function() {
        $('#modal-add').modal('hide')
        dataTable.ajax.reload()
        $('#form-add')[0].reset()
      }
    })
  })

  //Hapus Data
  $('#tabel tbody').on('click', '.btnHapus', function() {
    var data = dataTable.row($(this).parents('tr')).data()
    var id = data.id

    if (confirm('Anda yakin ingin menghapus data ini?')) {
      $.ajax({
        url: window.location.href + '/delete',
        type: 'POST',
        data: {
          id: id
        },
        success: function() {
          dataTable.ajax.reload()
        }
      })
    }
  })

  // Edit Data
  $('#tabel tbody').on('click', '.btnEdit', function() {
    var data = dataTable.row($(this).parents('tr')).data();

    $('#inputid').val(data.id);
    $('#inputjudul').val(data.judul);
    $('#inputpenulis').val(data.penulis);
    $('#inputpenerbit').val(data.penerbit);
    $('#inputstok').val(data.stok);
    $('#inputrilis').val(data.rilis);
    $('#inputkategori').val(data.fk_kategori);
    $('#inputwaktu').val(data.waktu_peminjaman);

    $('#modal-add').modal('show');
  });
</script>
<?php $this->endsection('script'); ?>