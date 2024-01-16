<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" />

	<title>PPDB <?= $profile->nama_sekolah ?></title>

	<link href="<?= base_url() ?>assets/css/app.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">

		<div class="main">
			<nav class="navbar navbar-expand-lg navbar-dark-blue bg-dark-blue fixed-top">
				<div class="container">
					<a class="navbar-brand" href="#"> <img src="<?= base_url() ?>assets/img/logo.png" height="30px" alt="" class="mr-1"> <span><?= $profile->nama_sekolah ?></span></a>
					<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item mr-2 active">
								<a class="nav-link" href="#home">Home</a>
							</li>
							<li class="nav-item mr-2">
								<a class="nav-link" href="#info">Info</a>
							</li>
							<li class="nav-item mr-2">
								<a class="nav-link" href="#alur">Alur Pendaftaran</a>
							</li>
							<li class="nav-item mr-2">
								<a class="nav-link" href="#contact">Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<section id="home" class="content">
				<div class="container py-5">

					<div class="row">
						<div class="col-sm-8">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Gelombang Tersedia</h5>
								</div>
								<table class="table table-striped my-0">
									<thead>
										<tr>
											<th class="text-dark-blue">Gelombang</th>
											<th class="d-none d-xl-table-cell text-dark-blue">Tanggal Dibuka</th>
											<th class="d-none d-xl-table-cell text-dark-blue">Tanggal Ditutup</th>
											<th class="d-none d-xl-table-cell text-dark-blue">Status</th>
											<th class="text-dark-blue">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($gelombangs as $key => $gelombang) : ?>
											<tr>
												<td>Gelombang <?= $gelombang->gelombang ?></td>
												<td class="d-none d-xl-table-cell"><?= $gelombang->tgl_buka ?></td>
												<td class="d-none d-xl-table-cell"><?= $gelombang->tgl_tutup ?></td>
												<td class="d-none d-xl-table-cell"><?= $gelombang->status == 1 ? '<span class="badge bg-success"> Dibuka </span>' : '<span class="badge bg-danger"> Ditutup </span>' ?></td>
												<td>
													<?php if ($gelombang->status == 1) : ?>
														<a href="" class="btn btn-primary btn-sm tombol-daftar" data-toggle="modal" data-target="#exampleModal" data-idgel="<?= $gelombang->id ?>">Daftar</a>
													<?php else : ?>
														<a href="" aria-disabled="true" class="btn btn-secondary btn-sm disabled">Daftar</a>
													<?php endif ?>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Login - Siswa</h5>
								</div>
								<div class="card-body">
									<div class="m-sm-4">
										<form action="<?= base_url('auth/login_siswa'); ?>" method="POST">
											<div class="mb-4">
												<label class="form-label">Nomor Telepon</label>
												<input class="form-control" type="number" name="nohp" placeholder="contoh. 086786576568">
											</div>
											<div class="mb-4">
												<label class="form-label">Password</label>
												<input class="form-control" type="password" name="password" placeholder="Masukan password">
											</div>
											<div class="text-center mt-4">
												<button type="submit" class="btn btn-md btn-primary">Login</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</section>

			<svg xmlns="http://www.w3.org/2000/svg" class="d-none d-lg-block d-md-none" style="margin-top: -250px; margin-bottom: -100px;" viewBox="0 0 1440 320">
				<path fill="#A7B7CB" fill-opacity="1" d="M0,96L80,112C160,128,320,160,480,154.7C640,149,800,107,960,101.3C1120,96,1280,128,1360,144L1440,160L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
			</svg>
			<section id="info" class="info">
				<div class="container py-5">
					<div class="row">
						<div class="col-md-5 text-center mb-4">
							<img src="<?= base_url() ?>/assets/img/ilustration/5100169.jpg" height="300px" alt="" class="shadow-md rounded img-fluid">
						</div>
						<div class="col-md-7">
							<h3 class="text-dark-blue">Pesyaratan Pendaftaran</h3>
							<div class="row mt-3">
								<?php foreach ($persyaratans as $key => $value) : ?>
									<div class="col-md-6">
										<div class="card">
											<div class="card-body text-center">
												<h5 class="text-blue"><?= $value->persyaratan ?></h5>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<svg xmlns="http://www.w3.org/2000/svg" class="d-none d-lg-block d-md-none" style="margin-top: -50px; margin-bottom: -150px;" viewBox="0 0 1440 320">
				<path fill="#A7B7CB" fill-opacity="1" d="M0,96L80,112C160,128,320,160,480,154.7C640,149,800,107,960,101.3C1120,96,1280,128,1360,144L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
			</svg>

			<section id="alur" class="alur">
				<div class="container py-5">
					<div class="row justify-content-center">
						<div class="col-sm-8">
							<div class="card">
								<div class="card-body">
									<img src="<?= base_url('assets/img/alur.jpg') ?>" class="img-fluid" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<svg class="d-none d-md-block d-sm-none" style="margin-top: -150px; margin-bottom: -30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="#a7b7cb" fill-opacity="1" d="M0,224L480,192L960,224L1440,160L1440,320L960,320L480,320L0,320Z"></path>
			</svg>
			<section id="contact" class="contact">
				<div class="container">
					<div class="row justify-content-beetwen">
						<div class="col-sm-6">

						</div>
					</div>
				</div>
			</section>
			<footer class="footer bg">
				<div class="container-fluid">
					<div class="row text-dark">
						<div class="col-sm-12 col-md-5 text-left">
							<p class="mb-0">
								Copyright &copy; <?= date('Y') ?> PPDB SMK GRISA
								<!-- <a href="<?= base_url() ?>assets/index.html" class="text-dark"><strong>AdminKit Demo</strong></a> &copy; -->
							</p>
						</div>
						<div class="col-sm-12 col-md-7 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-dark" href="#">Contact : </a>
								</li>
								<li class="list-inline-item">
									<a class="text-dark" href="#"><i class="align-middle mr-2" data-feather="phone"></i><?= $profile->cp_1; ?></a>
								</li>
								<li class="list-inline-item">
									<a class="text-dark" href="#"><i class="align-middle mr-2" data-feather="phone"></i><?= $profile->cp_2; ?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Form Pendaftaran Siswa Baru <br> SMK PGRI PESANGGARAN</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?= form_open_multipart('home/save'); ?>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Nama Lengkap</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
						<input type="hidden" id="id_gel" name="id_gel" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Nomor Telepon</label>
						<input type="number" name="nohp" class="form-control" placeholder="Nomor Telepon" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Sekolah Asal</label>
						<!-- <input type="text" name="sekolah_asal" class="form-control" placeholder="Asal Sekolah" required> -->
						<select class="form-control" name="sekolah_asal" id="" required>
							<option value="">Pilih Sekolah Asal</option>
							<?php foreach ($asalsekolahs as $key => $asalsekolah) : ?>
								<option value="<?= $asalsekolah->id ?>"><?= $asalsekolah->nama_asal_sekolah ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control" required>
							<option value="">Pilih Jurusan</option>
							<?php foreach ($jurusans as $key => $jurusan) : ?>
								<option value="<?= $jurusan->id ?>"><?= $jurusan->jurusan ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary btn-sm">Daftar</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<?php if ($this->session->flashdata()) : ?>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body">
						<?php if ($this->session->flashdata('success')) : ?>
							<div class="text-center">
								<img src="https://cdn.dribbble.com/users/251873/screenshots/9289747/media/6ddd0b400fbab6d5fa72d73df503f330.gif" height="250px" alt="">
								<h3>Hai!, <?= $this->session->flashdata('success')['nama']; ?> </h3>
								<h3>"AKUN ANDA BERHASIL DIBUAT"</h3>
								<h5>silahkan login dengan menggunakan</h5>
								<p>USERNAME : <b><?= $this->session->flashdata('success')['nohp']; ?></b></p>
								<p>PASSWORD : <b><?= $this->session->flashdata('success')['password']; ?></b></p>
								<h5>*MOHON DIINGAT JIKA PERLU SCREENSHOT</h5>
							</div>
						<?php elseif ($this->session->flashdata('error')) : ?>
							<div class="text-center">
								<img src="https://cdn.dribbble.com/users/251873/screenshots/9288094/media/a1c2f89065f68e1b2b5dcb66bdb9beb1.gif" height="250px" alt="">
								<h3><?= $this->session->flashdata('error'); ?> </h3>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/js/app.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<script>
		$('#myModal').modal('show');
	</script>
	<script>
		$(document).ready(function() {
			$(document).on('click', '.tombol-daftar', function() {
				var id_gel = $(this).data('idgel');
				$('#id_gel').val(id_gel);
			});
		});
	</script>
</body>

</html>