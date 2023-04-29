<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<section class="tasks">
    <div class="row">
        <div class="col-12">
            <div class="card widget-todo">
                <div class="card-body px-0 py-1 overflow-auto">
                    <?php if (logged_in() && in_groups('masyarakat') && !empty($buku)) : ?>
                        <ul class="widget-todo-list-wrapper mb-0" id="widget-todo-list">
                            <?php foreach ($buku as $Buku) : ?>
                                <li class="widget-todo-item">
                                    <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                        <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                            <i data-feather="list" class="cursor-move"></i>
                                            <div class="position-relative">
                                                <img class="rounded" src="./uploads/<?= $Buku['fk_ebook'] ?>-sampul.jpg" alt="" srcset="" height="70" />
                                                <span class="badge position-absolute rounded-circle bg-success p-1" style="top: -.5rem; right: -.5rem">
                                                    <small>
                                                        <?= $Buku['sisa'] ?>h
                                                    </small>
                                                </span>
                                            </div>
                                            <div class="col ms-2">
                                                <h6 class="widget-todo-title mb-0">
                                                    <?= $Buku['judul'] ?>
                                                </h6>
                                                <span><?= $Buku['penulis'] ?></span>
                                            </div>
                                        </div>
                                        <!-- <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                            <div class="row mx-2">
                                                <h5 class="me-1 mb-0 text-center">
                                                    21 Halaman
                                                </h5>
                                                <div class="px-0 py-1">
                                                    <table class="table table-borderless mb-0">
                                                        <tr>
                                                            33
                                                            <td class="col-10">
                                                                <div class="progress progress-sm progress-warning">
                                                                    <div class="progress-bar" role="progressbar" style="width: 12%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td class="col-2 text-center">12%</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="widget-todo-item-action d-flex align-items-center">
                                            <div class="row">
                                                <button class="btn btn-light-primary mb-1" onclick="kembalikan('<?= $Buku['id'] ?>')">Selesai</button>
                                                <a class="btn btn-primary" href="baca/<?= $Buku['fk_ebook'] ?>">Baca</a>
                                            </div>
                                            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php elseif (logged_in() && in_groups('masyarakat') && empty($buku)) : ?>
                        <p class="card-text p-3 text-center">Belum ada <a href="buku">buku</a> yang dipinjam</p>
                    <?php else : ?>
                        <p class="card-text p-3 text-center"><a href="login">Masuk</a> untuk dapat meminjam buku.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->endsection('content'); ?>

<?php $this->section('style'); ?>
<link rel="stylesheet" href="assets/extensions/dragula/dragula.min.css" />
<link rel="stylesheet" href="./assets/compiled/css/ui-widgets-todolist.css" />
<?php $this->endsection('style'); ?>

<?php $this->section('script'); ?>
<script src="assets/extensions/dragula/dragula.min.js"></script>
<script src="assets/static/js/pages/ui-todolist.js"></script>

<script>
    //pinjam buku
    function kembalikan(id) {
        $.ajax({
            url: 'api/pinjam/save',
            type: 'POST',
            data: {
                id: id,
                status: 'selesai'
            },
            success: function() {
                alert('Berhasil dikembalikan')
                window.location.reload()
            }
        })
    }
</script>
<?php $this->endsection('script'); ?>