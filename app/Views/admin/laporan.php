<?php $this->extend('layout'); ?>

<?php $this->section('tools'); ?>
<div id="btn-buku"></div>
<div id="btn-kategori"></div>
<div id="btn-peminjaman"></div>
<?php $this->endsection('tools'); ?>

<?php $this->section('content'); ?>
<div class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-md-4">
                        <label for="inputnama">Flter Tanggal</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="date" id="filterDate" class="form-control">
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="col-md-4">
                        <label for="inputTabel">Data</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <select class="form-select" id="inputTabel">
                            <option>Buku</option>
                            <option>Kategori</option>
                            <option>Peminjaman</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="buku">
                <table class="table table-hover" id="tabel"></table>
            </div>
            <div class="table-responsive" id="kategori">
                <table class="table table-hover" id="tabelkategori"></table>
            </div>
            <div class="table-responsive" id="peminjaman">
                <table class="table table-hover" id="tabelpeminjaman"></table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection('content'); ?>

<?php $this->section('script'); ?>
<script>
    var eSelect = document.getElementById('inputTabel');
    var tabelbuku = document.getElementById('buku');
    var tabelpeminjaman = document.getElementById('peminjaman');
    var tabelkategori = document.getElementById('kategori');
    eSelect.onchange = function() {
        $('#btn-buku').addClass('d-none')
        $('#btn-peminjaman').addClass('d-none')
        $('#btn-kategori').addClass('d-none')

        tabelbuku.style.display = 'none';
        tabelkategori.style.display = 'none';
        tabelpeminjaman.style.display = 'none';
        if (eSelect.selectedIndex === 0) {
            tabelbuku.style.display = 'block';
            $('#btn-buku').removeClass('d-none')
            dataTable.buttons().container().appendTo($('#btn-buku'))
        } else if (eSelect.selectedIndex === 1) {
            tabelkategori.style.display = 'block';
            $('#btn-kategori').removeClass('d-none')
            dataTablekategori.buttons().container().appendTo($('#btn-kategori'))
        } else if (eSelect.selectedIndex === 2) {
            tabelpeminjaman.style.display = 'block';
            dataTablePeminjaman.buttons().container().appendTo($('#btn-peminjaman'))
            $('#btn-peminjaman').removeClass('d-none')
        }
    }

    var dataTable = $('#tabel').DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        searching: false,
        dom: 'Bfrtip',
        buttons: [{
            'extend': 'print',
            'text': '<i class="bi bi-printer"></i> Cetak',
            'className': 'btn btn-primary block',
            'orientation': 'landscape',
            'message': 'total buku <?= $total['buku'] ?> <br> total kategori <?= $total['kategori'] ?>',
            'title': '',
            customize: function(win) {
                $(win.document.body).prepend('<img src="<?= base_url('assets/static/images/logo/Kop.png') ?>" alt="Kop Surat">')
                $(win.document.body).append('<img src="<?= base_url('assets/static/images/logo/ttd.png') ?>" alt="ttd">')
            }
        }, ],
        ajax: '<?= base_url('admin/ebook/show') ?>',
        order: [],
        columns: [{
                "title": "#",
                "data": "kode_id"
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
        ],
    })

    //place button print
    dataTable.buttons().container().appendTo($('#btn-buku'))

    var dataTablekategori = $('#tabelkategori').DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        searching: false,
        dom: 'Bfrtip',
        buttons: [{
            'extend': 'print',
            'text': '<i class="bi bi-printer"></i> Cetak',
            'className': 'btn btn-primary block',
            'orientation': 'landscape',
            'message': 'total buku <?= $total['buku'] ?> <br> total kategori <?= $total['kategori'] ?>',
            'title': '',
            customize: function(win) {
                $(win.document.body).prepend('<img src="<?= base_url('assets/static/images/logo/Kop.png') ?>" alt="Kop Surat">')
                $(win.document.body).append('<img src="<?= base_url('assets/static/images/logo/ttd.png') ?>" alt="ttd">')
            }
        }, ],
        ajax: '<?= base_url('admin/kategori/show') ?>',
        order: [],
        columns: [{
                "title": "#",
                "data": "kode_id"
            },
            {
                "title": "Kategori",
                "data": "nama"
            },
            {
                "title": "Total",
                "data": "total"
            },
        ],
    })


    var dataTablePeminjaman = $('#tabelpeminjaman').DataTable({
        responsive: true,
        autoWidth: false,
        processing: true,
        searching: false,
        dom: 'Bfrtip',
        buttons: [{
            'extend': 'print',
            'text': '<i class="bi bi-printer"></i> Cetak',
            'className': 'btn btn-primary block',
            'orientation': 'landscape',
            'message': 'total buku <?= $total['buku'] ?> <br> total kategori <?= $total['kategori'] ?>',
            'title': '',
            customize: function(win) {
                $(win.document.body).prepend('<img src="<?= base_url('assets/static/images/logo/Kop.png') ?>" alt="Kop Surat">')
                $(win.document.body).append('<img src="<?= base_url('assets/static/images/logo/ttd.png') ?>" alt="ttd">')
            }
        }, ],
        ajax: '<?= base_url('admin/peminjaman/show') ?>',
        order: [],
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
        ]
    })


    // Tambahkan fitur pencarian berdasarkan tanggal
    $('#filterDate').on('keyup change', function() {
        var tanggalCari = $(this).val();
        dataTable.columns(4).search(tanggalCari).draw();
    });

    tabelbuku.style.display = 'block';
    tabelkategori.style.display = 'none';
    tabelpeminjaman.style.display = 'none';
</script>
<?php $this->endSection('script'); ?>