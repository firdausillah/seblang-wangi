<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Cetak Laporan <?= $ruang->nama_ruang ?></title>
</head>

<body>
    <section id="cetak" style="height: 1000px;">
        <div class="container pt-5 py-5">
            <div class="row justify-content-center mb-4">
                <div class="col-md-12 text-center">
                    <h4>DAFTAR INVENTARIS SARANA / PRASARANA</h4>
                    <h4><?= $ruang->nama_ruang ?></h4>
                    <h4><?= $profile->nama_sekolah ?></h4>
                    <!-- <hr> -->
                </div>
            </div>
            <button class="btn btn-primary btn-sm d-print-none" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-danger btn-sm d-print-none" onClick="javascript:window.close();"><i class="fa fa-window-close"></i> Close</button>
            <div class="row mt-5">
                <div class="col-md-8">
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td style="width: 20%">Nama Gedung</td>
                                <td style="width: 1%">:</td>
                                <td style="width: 79%"><?= $ruang->nama_gedung ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Nama Ruangan</td>
                                <td style="width: 1%">:</td>
                                <td style="width: 79%"><?= $ruang->nama_ruang ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Panjang</td>
                                <td style="width: 1%">:</td>
                                <td style="width: 79%"><?= $ruang->panjang ?> m</td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Lebar</td>
                                <td style="width: 1%">:</td>
                                <td style="width: 79%"><?= $ruang->lebar ?> m</td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Tinggi</td>
                                <td style="width: 1%">:</td>
                                <td style="width: 79%"><?= $ruang->tinggi ?> m</td>
                            </tr>
                            <tr>
                                <td style="width: 20%">keterangan</td>
                                <td style="width: 1%">:</td>
                                <td style="width: 79%"><?= $ruang->kondisi ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 text-center">
                    <img src="<?= base_url('uploads/img/sarpras/ruang/' . $ruang->foto) ?>" class="img-fluid" alt="">
                    <p class="font-italic" style="font-size: 13px;">Gambar. <?= $ruang->nama_ruang ?></p>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <td class="text-center">No</td>
                                <td class="text-center">Kode Sarana</td>
                                <td class="text-center">Nama Sarana</td>
                                <td class="text-center">Tahun Masuk</td>
                                <td class="text-center">Jumlah</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">Kondisi</td>
                                <td class="text-center" style="width: 250px;">Keterangan</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang_ruang as $key => $br) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $br->kode_sarpras ?></td>
                                    <td><?= $br->nama_barang ?></td>
                                    <td><?= $br->tahun_masuk ?></td>
                                    <td><?= $br->jumlah ?></td>
                                    <td><?= $br->status ?></td>
                                    <td><?= $br->kondisi ?></td>
                                    <td><?= $br->keterangan ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script language="javascript" type="text/javascript">
        function windowClose() {
            window.open('', '_parent', '');
            window.close();
        }
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>