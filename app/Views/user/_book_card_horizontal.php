<div class="col-lg-6 col-sm-12">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0 p-4">
            <div class="col-4 py-4">
                <img class="card-img-top card-img-bottom" src="./uploads/<?= $id ?>-sampul.jpg" alt="Card image cap" style="height: 12rem">
            </div>
            <div class="col-8 py-1">
                <div class="card-body">
                    <h5 class="card-title"><?= $judul ?></h5>
                    <a href="buku?kategori=<?= $fk_kategori ?>"><span class="badge bg-light-info"><?= ucfirst($kategori) ?></span></a>
                    <p class="card-text mt-3">
                        <?= $penulis ?> • <?= date_parse($rilis)['year'] ?>
                    </p>
                    <button class="btn btn-sm icon icon-left btn-outline-primary block" onclick="simpan(<?= $id ?>)">
                        <i class="bi bi-bookmark mx-1"></i>
                        Pinjam
                    </button>
                    <!-- <a class="btn btn-sm icon icon-left btn-primary block" href="baca/<?= $id ?>">
                        <i class="bi bi-book mx-1"></i>
                        Baca
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</div>