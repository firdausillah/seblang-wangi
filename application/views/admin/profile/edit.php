<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <?= form_open_multipart(base_url('admin/profile/update/1')) ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Sekolah <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="nama_sekolah" value="<?= $profile->nama_sekolah ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Kepala Sekolah <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="nama_kepalasekolah" value="<?= $profile->nama_kepalasekolah ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat Sekolah <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="alamat" value="<?= $profile->alamat ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tahun Ajaran <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="tahun_ajaran" value="<?= $profile->tahun_ajaran ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Contact Person 1 <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="cp_1" value="<?= $profile->cp_1 ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Contact Person 2 <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="cp_2" value="<?= $profile->cp_2 ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Website <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="website" value="<?= $profile->website ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Sosial Media 1</label>
                                <input type="text" class="form-control" name="sosial_media_1" value="<?= $profile->sosial_media_1 ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Sosial Media 2</label>
                                <input type="text" class="form-control" name="sosial_media_2" value="<?= $profile->sosial_media_2 ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Sosial Media 3</label>
                                <input type="text" class="form-control" name="sosial_media_3" value="<?= $profile->sosial_media_3 ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="gambar">Logo <small class="text-danger">maksimal 2 MB</small>  <small class="text-danger">*</small></label>
                            <input type="hidden" name="logo" value="<?= @$profile->logo ?>">
                            <input class="form-control" type="file" name="gambar" id="gambar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <a href="<?= $img = base_url('assets/img/' . $profile->logo) ?>" target='_blank' class="pt-5">
                                <img src="<?= $img ?>" height="150px" alt="" class="rounded">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>