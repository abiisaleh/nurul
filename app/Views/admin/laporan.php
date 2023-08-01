<?php $this->extend('layout'); ?>

<?php $this->section('tools'); ?>
<div id="btn-tools"></div>
<?php $this->endsection('tools'); ?>

<?php $this->section('content'); ?>
<div class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="col-md-4">
                        <label for="inputnama">Flter Tanggal</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="date" id="filterDate" class="form-control">
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
    dataTable.buttons().container().appendTo($('#btn-tools'))

    // Tambahkan fitur pencarian berdasarkan tanggal
    $('#filterDate').on('keyup change', function() {
        var tanggalCari = $(this).val();
        dataTable.columns(4).search(tanggalCari).draw();
    });
</script>
<?php $this->endSection('script'); ?>