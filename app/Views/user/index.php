<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<?php if (logged_in() && is_null($masyarakat) && in_groups('masyarakat')) : ?>
    <div class="alert alert-light-primary color-primary alert-dismissible fade show">
        <i class="bi bi-exclamation-circle"></i> Lengkapi <a href="user">Data Diri</a> untuk meminjam buku.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<section class="section">
    <div class="row">
        <div class="col-6 col-md-3">
            <?php foreach ($terbaru as $buku) : ?>
                <?= view('user/_book_card_vertical', $buku) ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Populer</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($populer as $buku) : ?>
            <?= view('user/_book_card_horizontal', $buku) ?>
        <?php endforeach; ?>
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
                success: function(response) {
                    alert(response.pesan)
                },
                error: function() {
                    alert('stok sudah habis')
                }
            })
        <?php else : ?>
            alert('Masuk untuk dapat meminjam buku')
        <?php endif; ?>
    }
</script>
</script>
<?php $this->endsection('script'); ?>