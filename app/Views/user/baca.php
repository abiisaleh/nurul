<!DOCTYPE html>
<!--[if IEMobile 7 ]>    <html class="no-js iem7"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!-->
<html class="no-js"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <title>Bootstrap PDF Viewer</title>
  <meta name="description" content="">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="cleartype" content="on">

  <!-- For iOS web apps. Delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="">

  <base href="<?= base_url() ?>">

  <!-- Twitter Bootstrap -->
  <link rel="stylesheet" href="bootstrap-pdf-viewer/lib/twitter-bootstrap/css/bootstrap.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap-pdf-viewer/lib/font-awesome/css/font-awesome.css">

  <!-- Bootstrap PDF Viewer -->
  <link rel="stylesheet" href="bootstrap-pdf-viewer/css/bootstrap-pdf-viewer.css">
</head>

<body>

  <!-- Bootstrap PDF Viewer -->
  <div id="viewer" class="pdf-viewer" data-url="<?= base_url('uploads') ?>/<?= $id ?>-buku.pdf"></div>

  <!-- jQuery -->
  <script src="bootstrap-pdf-viewer/lib/jquery-1.9.1.js"></script>

  <!-- Twitter Bootstrap -->
  <script src="bootstrap-pdf-viewer/lib/twitter-bootstrap/js/bootstrap.js"></script>

  <!-- Bootstrap PDF Viewer -->
  <script src="bootstrap-pdf-viewer/lib/pdf.js"></script>
  <script src="bootstrap-pdf-viewer/js/bootstrap-pdf-viewer.js"></script>

  <script>
    var noPrint = true;
    var noCopy = true;
    var noScreenshot = true;
    var autoBlur = false;

    var viewer;

    $(function() {
      viewer = new PDFViewer($('#viewer'));
    });
  </script>

  <!-- NoPrint -->
  <script src="assets/extensions/noprint/noprint.js"></script>
</body>

</html>