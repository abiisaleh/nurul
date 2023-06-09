<?php $this->extend('layout'); ?>

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
  <div class="modal fade text-left" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">
            Ubah Data
          </h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
          <form class="form form-horizontal" id="form-add">
            <?= csrf_field(); ?>
            <input type="text" id="inputid" name="id" hidden>
            <div class="form-body">
              <div class="row">

                <div class="col-md-4">
                  <label for="inputnama">nama</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" id="inputnama" class="form-control" name="nama" placeholder="-" />
                </div>

                <div class="col-md-4">
                  <label for="inputjenis_kelamin">Jenis Kelamin</label>
                </div>
                <div class="col-md-8 form-group">
                  <fieldset class="form-group">
                    <select class="form-select" id="inputjenis_kelamin" name="jenis_kelamin">
                      <option>Pria</option>
                      <option>Wanita</option>
                    </select>
                  </fieldset>
                </div>

                <div class="col-md-4">
                  <label for="inputalamat">Alamat</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" id="inputalamat" class="form-control" name="alamat" placeholder="-" />
                </div>

                <div class="col-md-4">
                  <label for="inputtelp">telp</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="number" id="inputtelp" class="form-control" name="telp" placeholder="-" />
                </div>

                <div class="col-md-4">
                  <label for="inputtanggal_lahir">Tanggal lahir</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="date" id="inputtanggal_lahir" class="form-control" name="tanggal_lahir" placeholder="-" />
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
</section>


<?php $this->endsection('content'); ?>

<?php $this->section('style'); ?>
<link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />

<link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css" />
<?php $this->endsection('style'); ?>

<?php $this->section('script'); ?>
<script src="assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="assets/static/js/pages/datatables.js"></script>

<script>
  var dataTable = $('#tabel').DataTable({
    responsive: true,
    autoWidth: false,
    processing: true,
    ajax: window.location.href + '/show',
    columns: [{
        "title": "#",
        "data": "kode_id"
      },
      {
        "title": "Nama",
        "data": "nama"
      },
      {
        "title": "Jenis Kelamin",
        "data": "jenis_kelamin"
      },
      {
        "title": "Alamat",
        "data": "alamat"
      },
      {
        "title": "Telp",
        "data": "telp"
      },
      {
        "title": "Tanggal Lahir",
        "data": "tanggal_lahir"
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
    ]
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
    $('#inputnama').val(data.nama);
    $('#inputjenis_kelamin').val(data.jenis_kelamin);
    $('#inputalamat').val(data.alamat);
    $('#inputtelp').val(data.telp);
    $('#inputtanggal_lahir').val(data.tanggal_lahir);

    $('#modal-add').modal('show');
  });
</script>
<?php $this->endsection('script'); ?>