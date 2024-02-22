<div class="card">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->
    <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="<?= (@$relawan->foto != null ? base_url('uploads/img/relawan/' . @$relawan->foto) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png') ?>" alt="user-avatar" class="d-block rounded" height="100" id="uploadedAvatar">
            <div class="button-wrapper">
                <?= form_open_multipart(base_url('relawan/profile/image_save')) ?>
                <div class="row">
                    <div class="col-8">
                        <div class="input-group input-group-merge">
                            <input class="form-control foto" type="file" name="foto" required>
                        </div>
                        <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                        <input type="hidden" class="form-control" value="<?= @$relawan->foto ?>" name="gambar">
                        <input type="hidden" name="nama" value="<?= @$relawan->nama ?>">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-outline-primary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </div>
                </form>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
        </div>
    </div>
    <hr class="my-0">
    <div class="card-body">
        <?= form_open_multipart(base_url('relawan/profile/save')) ?>
        <input type="hidden" name="id" value="<?= @$relawan->id ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="nama">nama <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="nama" id="nama" value="<?= @$relawan->nama ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="kode">kode Anggota <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="kode" id="kode" value="<?= @$relawan->kode ?>" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="id_unit">Unit <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" readonly value="<?= @$relawan->unit_nama ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" width="100px">
                        <option value="">--Pilih--</option>
                        <option <?= @$relawan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                        <option <?= @$relawan->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="angkatan">Angkatan</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="angkatan" id="angkatan" value="<?= (@$relawan->angkatan != null ? @$relawan->angkatan : date('Y')) ?>" class="form-control" placeholder="Masukan Tahun. Contoh: 2024">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="expired_year">Aktif Sampai -</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="expired_year" id="expired_year" value="<?= (@$relawan->expired_year != null ? @$relawan->expired_year : date('Y') + 3) ?>" class="form-control" placeholder="Masukan Tahun. Contoh: 2027">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="email" name="email" id="email" value="<?= @$relawan->email ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="telepon">Nomor Telepon <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="telepon" id="telepon" value="<?= @$relawan->telepon ?>" class="form-control" placeholder="Masukan Nomor Telepon. Contoh: 085245123554" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan</label>
            <div class="input-group input-group-merge">
                <input type="text" name="keterangan" id="keterangan" value="<?= @$relawan->keterangan ?>" class="form-control">
            </div>
        </div>
        <a href="<?= base_url('relawan/profile') ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <!-- /Account -->
</div>