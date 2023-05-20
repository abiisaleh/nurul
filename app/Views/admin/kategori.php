<?php $this->extend('layout'); ?>

<?php $this->section('tools'); ?>
<div class="float-start float-sm-end">
  <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#modal-add">
    <i class="bi bi-plus"></i> Tambah Data
  </button>
</div>
<?php $this->endsection('tools'); ?>

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
            Tambah Data
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
                  <label for="inputkategori">Kategori</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" id="inputkategori" class="form-control" name="nama" placeholder="-" />
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
    bLengthChange: false,
    responsive: true,
    autoWidth: false,
    processing: true,
    searching: false,
    ajax: window.location.href + '/show',
    columns: [{
        "title": "#", "data": "kode_id"
      },
      {
        "title": "Kategori", "data": "nama"
      },
      {
        "title": "Total", "data": "total"
      },
      {
        "title": "Aksi"
      },
    ],
    columnDefs: [{
      "targets": -1,
      "data": null,
      "defaultContent": "<button class='btn btn-sm btn-danger btnHapus'>Hapus</button> <button class='btn btn-sm btn-warning btnEdit'>Edit</button>"
    }, ]
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
    $('#inputkategori').val(data.nama);

    $('#modal-add').modal('show');
  });
</script>
<?php $this->endsection('script'); ?>