<p>Seseorang telah meminta pengaturan ulang kata sandi pada alamat email ini untuk <?= site_url() ?>.</p>

<p>Untuk mengatur ulang kata sandi, gunakan kode atau URL berikut dan ikuti petunjuk.</p>

<p>Kode Anda: <?= $hash ?></p>

<p>Kunjungi <a href="<?= url_to('reset-password') . '?token=' . $hash ?>">Formulir Pengaturan Ulang</a>.</p>

<br>

<p>Jika Anda tidak meminta pengaturan ulang kata sandi, Anda dapat mengabaikan email ini dengan aman.</p>