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
                  <label for="inputjudul">Nama Peminjam</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="fk_masyarakat" id="inputmasyarakat" class="form-select"></select>
                </div>

                <div class="col-md-4">
                  <label for="inputebook">Buku</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="fk_ebook" id="inputebook" class="form-select"></select>
                </div>

                <div class="col-md-4">
                  <label for="inputstatus">Status</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="status" id="inputstatus" class="form-select">
                    <option>-</option>
                    <option>pinjam</option>
                    <option>selesai</option>
                  </select>
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

<?php $this->section('script'); ?>
<script src="assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="assets/static/js/pages/datatables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
  $.getJSON('admin/masyarakat/show', function(data) {
    var select = $('#inputmasyarakat')
    $.each(data.data, function(index, value) {
      var option = $("<option/>")

      option.val(value.id)
      option.text(value.nama)
      select.append(option)
    })
  })

  $.getJSON('admin/ebook/show', function(data) {
    var select = $('#inputebook')
    $.each(data.data, function(index, value) {
      var option = $("<option/>")

      option.val(value.id)
      option.text('#' + value.id + ' ' + value.judul)
      select.append(option)
    })
  })

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
        "title": "Tanggal Pinjam",
        "data": "tanggal_pinjam"
      },
      {
        "title": "Tanggal Kembali",
        "data": "tanggal_kembali"
      },
      {
        "title": "Status",
        "data": "status",
        "render": function(data) {
          if (data == 'pinjam') {
            return '<span class="badge bg-warning text-dark">' + data + '</span>'
          } else {
            return '<span class="badge bg-success">' + data + '</span>'
          }
        }
      },
      {
        "title": "Peminjam",
        "data": "masyarakat"
      },
      {
        "title": "Buku",
        "data": "ebook"
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
    $('#inputjudul').val(data.judul);
    $('#inputpenulis').val(data.penulis);
    $('#inputpenerbit').val(data.penerbit);
    $('#inputrilis').val(data.rilis);

    $('#modal-add').modal('show');
  });
</script>
<?php $this->endsection('script'); ?>