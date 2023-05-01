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
                <h6 class="font-extrabold mb-0"><?= number_format($count['buku']) ?></h6>
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
                <h6 class="font-extrabold mb-0"><?= number_format($count['masyarakat']) ?></h6>
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
                <h6 class="font-extrabold mb-0"><?= number_format($count['peminjaman']) ?></h6>
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
        <?php foreach ($buku as $row) : ?>
          <div class="recent-message d-flex px-4 py-3">
            <div class="col-1 col-sm-1 col-lg-2">
              <img src="<?= base_url('uploads/' . $row['id']) ?>-sampul.jpg" class="img-fluid rounded" />
            </div>
            <div class="name ms-4">
              <h5 class="mb-1"><?= $row['judul'] ?></h5>
              <h6 class="text-muted mb-0"><?= $row['penulis'] ?></h6>
            </div>
          </div>
        <?php endforeach; ?>
        <div class="px-4">
          <a href="admin/buku" class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">
            Lihat Buku
          </a>
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

<script>
  var optionsProfileVisit = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
      toolbar: {
        show: true,
        offsetX: 0,
        offsetY: 0,
        tools: {
          download: true,
          selection: true,
          zoom: true,
          zoomin: true,
          zoomout: true,
          pan: true,
          reset: true | '<img src="/static/icons/reset.png" width="20">',
          customIcons: []
        },
        export: {
          csv: {
            filename: undefined,
            columnDelimiter: ',',
            headerCategory: 'category',
            headerValue: 'value',
            dateFormatter(timestamp) {
              return new Date(timestamp).toDateString()
            }
          },
          svg: {
            filename: undefined,
          },
          png: {
            filename: undefined,
          }
        },
        autoSelected: 'zoom'
      },
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [{
      name: "masyarakat",
      data: [<?= implode(", ", $graph); ?>],
    }, ],
    colors: "#435ebe",
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
    },
  }

  var chartProfileVisit = new ApexCharts(
    document.querySelector("#chart-profile-visit"),
    optionsProfileVisit
  )

  chartProfileVisit.render()
</script>
<?php $this->endsection('script'); ?>