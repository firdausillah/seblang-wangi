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

    <title>Login | SEBLANG WANGI</title>

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
                    <img src="<?=base_url('assets/img/logo-pmi.png')?>" width="60">
                  </span>
                  <span class="app-brand-text fs-4 text-body fw-bolder">SEBLANG WANGI</span>
                </a>
              </div>
              <!-- /Logo -->
              <h5 class="mb-2">Selamat datang di Sistem E-mobile Palang Merah Indonesia Banyuwangi! 👋</h5>
              <!-- <p class="mb-4">Silahkan login untuk melanjutkan</p> -->
              <?php if ($this->session->flashdata('message')) : ?>
              <div class="alert alert-dark alert-dismissible mb-2" role="alert">
                <?= $this->session->flashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php endif ?>
              <form id="formAuthentication" class="mb-3" action="<?= base_url('login/auth') ?>" method="POST">
                <div class="mb-3">
                  <label for="is_admin" class="form-label">Login Sebagai</label>
                  <select class="form-select" name="is_admin" id="is_admin">
                    <option value="relawan">Relawan</option>
                    <option value="unit">Unit</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username/Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Masukan username / email"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>
              <p class="text-center">
                <span>Belum register Unit?</span>
                <a href="<?= base_url('register/unit') ?>">
                  <span>Registrasi Unit</span>
                </a>
              </p>

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