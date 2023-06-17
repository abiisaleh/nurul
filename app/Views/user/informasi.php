<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<section class="mt-3">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="assets/static/images/bg/002.jpg" alt="Card image cap" />
                </div>
                <div class="card-header">
                    <h4 class="card-title">Digilab Balai Bahasa Provinsi Papua</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Balai Bahasa Papua memiliki sebuah perpustakaan sebagai pusat kegiatan pengembangan minat baca dan kebiasaan membaca untuk berbagai kalangan.
                    </p>
                    <p class="card-text">
                        Digital Libray (Digilab) Balai Bahasa Papua bertujuan untuk memberikan layanan perpustakaan online dimana masyarakat dapat meminjam dan membaca buku yang tersedia secara online.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cara Meminjam Buku</h4>
                </div>
                <div class="card-body">
                    <h6>Buat Akun</h6>
                    <p class="card-text">
                        Sebelum meminjam buku pastikan sudah punya <a href="login">akun</a>, jika belum anda dapat <a href="register">membuat akun</a>.
                    </p>
                    <h6>Pinjam buku</h6>
                    <p class="card-text">
                        Setelah itu klik pada buku yang ingin dipinjam. anda bisa mengklik tombol pinjam atau mengklik gambar bukunya. setelah berhasil dipinjam maka buku akan berada di <a href="pinjam">menu pinjam</a>.
                    </p>
                    <h6>Baca & Kembalikan</h6>
                    <p class="card-text">
                        Anda dapat membaca dan mengembalikan buku yang sudah dipinjam. buku akan otomatis dikembalikan jika sudah melewati batas peminjaman (7 Hari)
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php $this->endsection('content'); ?>