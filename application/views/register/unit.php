<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= base_url() ?>assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Registrasi | SEBLANG WANGI</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url() ?>assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>" data-fdstatus="<?= $this->session->flashdata('status') ?>"></div>
          
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="d-flex flex-column gap-2">
                  <span class=" d-flex justify-content-center">
                    <img src="https://ifoxsoft.com/wp-content/uploads/2022/11/PMI-Logo-Vector-PNG-%E2%80%93-IfoxSoft.Com_.webp" width="60">
                  </span>
                  <span class="app-brand-text fs-4 text-body fw-bolder">SEBLANG WANGI</span>
                </a>
              </div>
              <!-- /Logo -->
              <h5 class="mb-4">Registrasi Unit</h5>

              <form id="formAuthentication" class="mb-3" action="<?= base_url('register/register_unit') ?>" method="POST">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Unit</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="" autofocus required/>
                </div>
                <div class="mb-3">
                  <label for="telepon" class="form-label">Nomor Telepon</label>
                  <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukan Angka. Contoh: 08561426576" required/>
                </div>
                <div class="mb-3">
                  <label for="jenis" class="form-label">Jenis Unit</label>
                    <select class="form-select" name="jenis" id="jenis" width="100px" required>
                        <option value="">--Pilih--</option>
                        <option value="PMR">PMR</option>
                        <option value="KSR">KSR</option>
                        <option value="TSR">TSR</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="kategori" class="form-label">Kategori Unit</label>
                    <select class="form-select" name="kategori" id="kategori" width="100px">
                        <option value="">--Pilih--</option>
                        <option value="MULA">MULA</option>
                        <option value="MADYA">MADYA</option>
                        <option value="WIRA">WIRA</option>
                    </select>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                </div>
                <div class="mb-3">
                  <a class="btn btn-secondary d-grid w-100" type="" href="<?=base_url('login')?>">Batal</a>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>

    <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <!-- <script src="<?= base_url() ?>assets/js/ui-modals.js"></script> -->
    
    <!-- Page JS -->
    <script src="<?= base_url() ?>assets/js/myScript.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>