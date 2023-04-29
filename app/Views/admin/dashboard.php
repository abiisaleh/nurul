<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<section class="row">
  <div class="col-12 col-lg-8">
    <div class="row">
      <div class="col-12 col-sm-4">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon purple mb-2">
                  <i class="iconly-boldPaper"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Buku</h6>
                <h6 class="font-extrabold mb-0">112.000</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-4">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon blue mb-2">
                  <i class="iconly-boldProfile"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Masyarakat</h6>
                <h6 class="font-extrabold mb-0">183.000</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-4">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                <div class="stats-icon green mb-2">
                  <i class="iconly-boldBookmark"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Dipinjam</h6>
                <h6 class="font-extrabold mb-0">80.000</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Pengunjung</h4>
          </div>
          <div class="card-body">
            <div id="chart-profile-visit"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-4">
    <div class="card">
      <div class="card-body py-4 px-4">
        <div class="d-flex align-items-center">
          <div class="avatar avatar-xl">
            <img src="./assets/compiled/jpg/1.jpg" alt="Face 1" />
          </div>
          <div class="ms-3 name">
            <h5 class="font-bold">John Duck</h5>
            <h6 class="text-muted mb-0">@johnducky</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Buku Populer</h4>
      </div>
      <div class="card-content pb-4">
        <div class="recent-message d-flex px-4 py-3">
          <div class="avatar avatar-lg">
            <img src="./assets/compiled/jpg/4.jpg" />
          </div>
          <div class="name ms-4">
            <h5 class="mb-1">Hank Schrader</h5>
            <h6 class="text-muted mb-0">@johnducky</h6>
          </div>
        </div>
        <div class="recent-message d-flex px-4 py-3">
          <div class="avatar avatar-lg">
            <img src="./assets/compiled/jpg/5.jpg" />
          </div>
          <div class="name ms-4">
            <h5 class="mb-1">Dean Winchester</h5>
            <h6 class="text-muted mb-0">@imdean</h6>
          </div>
        </div>
        <div class="recent-message d-flex px-4 py-3">
          <div class="avatar avatar-lg">
            <img src="./assets/compiled/jpg/1.jpg" />
          </div>
          <div class="name ms-4">
            <h5 class="mb-1">John Dodol</h5>
            <h6 class="text-muted mb-0">@dodoljohn</h6>
          </div>
        </div>
        <div class="px-4">
          <button class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">
            Lihat Buku
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->endsection('content'); ?>

<?php $this->section('style'); ?>
<link rel="stylesheet" href="./assets/compiled/css/iconly.css" />
<?php $this->endsection('style'); ?>

<?php $this->section('script'); ?>
<!-- Need: Apexcharts -->
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/static/js/pages/dashboard.js"></script>
<?php $this->endsection('script'); ?>