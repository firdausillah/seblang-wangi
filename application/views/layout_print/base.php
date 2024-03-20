<!DOCTYPE html>
<html>

<head>
  <title><?= $title ? $title : '' ?> | Seblang Wangi</title>
  <style>
    @media print {
      .page-break {
        page-break-before: always;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <?php $this->load->view($content) ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Skrip yang ingin dijalankan setelah halaman dimuat
      window.print(); // Contoh: beralih ke mode cetak
    });
  </script>
</body>

</html>