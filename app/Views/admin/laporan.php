<?php $this->extend('layout'); ?>

<?php $this->section('tools'); ?>
<div id="btn-tools"></div>
<?php $this->endsection('tools'); ?>

<?php $this->section('content'); ?>
<div class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="tabel"></table>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection('content'); ?>

<?php $this->section('script'); ?>
<script>
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
            'message': 'total buku <?= $total['buku'] ?> <br> total kategori <?= $total['kategori'] ?>',
            'title': '',
            customize: function(win) {
                $(win.document.body).find('h1')
                    .addClass('text-center')
                    .html('Laporan Peminjaman <br> Balai Bahasa Jayapura')
            }
        }, ],
        ajax: '<?= base_url('admin/ebook/show') ?>',
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
    dataTable.buttons().container().appendTo($('#btn-tools'))
</script>
<?php $this->endSection('script'); ?>