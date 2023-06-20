<?php $this->extend('layout'); ?>

<?php $this->section('tools'); ?>
<div id="btn-tools"></div>
<?php $this->endsection('tools'); ?>

<?php $this->section('content'); ?>
<div class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="col-md-4">
                        <label for="inputnama">Awal Tanggal</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" id="min" name="min" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-md-4">
                        <label for="inputnama">Akhir Tanggal</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" id="max" name="max" class="form-control">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover" id="tabel"></table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection('content'); ?>

<?php $this->section('script'); ?>
<script>
    //filter by date
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[1]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max)
            ) {
                return true;
            }
            return false;
        }
    );


    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'DD MMMM YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'DD MMMM YYYY'
    });

    var dataTable = $('#tabel').DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        dom: 'Bfrtip',
        buttons: [{
            'extend': 'print',
            'text': '<i class="bi bi-printer"></i> Cetak',
            'className': 'btn btn-primary block',
            'orientation': 'landscape',
            'message': 'tanggal',
            'title': '',
            customize: function(win) {
                $(win.document.body).find('h1')
                    .addClass('text-center')
                    .html('Laporan Peminjaman <br> Balai Bahasa Jayapura')
            }
        }, ],
        ajax: 'admin/peminjaman/show',
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
        ],
        order: [
            [1, 'desc']
        ],

    })

    //place button print
    dataTable.buttons().container().appendTo($('#btn-tools'))

    // Refilter the table
    $('#min, #max').on('change', function() {
        dataTable.draw();
    });
</script>
<?php $this->endSection('script'); ?>