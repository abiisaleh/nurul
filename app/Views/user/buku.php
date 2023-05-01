<?php $this->extend('layout'); ?>

<?php $this->section('tools'); ?>
<div class="float-start float-sm-end">
    <div class="btn-group mb-1">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-funnel"></i> Kategori
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php foreach ($kategori as $value) : ?>
                    <a class="dropdown-item" href="buku?kategori=<?= $value['id'] ?>"><?= ucfirst($value['nama']) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endsection('tools'); ?>

<?php $this->section('content'); ?>
<section class="section">
    <div class="row">
        <?php foreach ($ebook as $buku) : ?>
            <?= view('user/_book_card_horizontal', $buku) ?>
        <?php endforeach; ?>

        <?php if (empty($ebook)) : ?>
            <div class="alert alert-light-primary color-primary alert-dismissible fade show">
                <i class="bi bi-exclamation-circle"></i> Buku yang kamu cari tidak ditemukan.
            </div>
        <?php endif; ?>

        <div class="mb-3"></div>

        <?= $pager ?>
    </div>
</section>
<?php $this->endsection('content'); ?>

<?php $this->section('script'); ?>
<script>
    $(function() {
        $('.card').hover(function() {
            $(this).addClass('shadow')
        }, function() {
            $(this).removeClass('shadow')
        })
    })

    //pinjam buku
    function simpan(id) {
        <?php if (in_groups('masyarakat') && !empty($masyarakat)) : ?>
            $.ajax({
                url: 'api/pinjam/save',
                type: 'POST',
                data: {
                    fk_ebook: id,
                    fk_masyarakat: <?= $masyarakat['id'] ?>
                },
                success: function() {
                    alert('Berhasil dipinjam')
                },
                error: function() {
                    alert('Stok sudah habis atau buku sudah dipinjam')
                }
            })
        <?php else : ?>
            alert('Masuk untuk dapat meminjam buku')
        <?php endif; ?>
    }
</script>
<?php $this->endsection('script'); ?>