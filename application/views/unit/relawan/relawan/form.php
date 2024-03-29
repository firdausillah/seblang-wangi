<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('unit/relawan/relawan/save')) ?>
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
                    <select class="form-select" name="id_unit" id="id_unit" width="100px" required>
                        <option value="<?= $unit->id ?>" selected><?= $unit->nama ?></option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="password" id="password" value="<?= @$relawan->password ?>" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="angkatan">Angkatan <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="angkatan" id="angkatan" value="<?= (@$relawan->angkatan != null ? @$relawan->angkatan : date('Y')) ?>" class="form-control" placeholder="Masukan Tahun. Contoh: 2024" required>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="expired_year">Aktif Sampai - <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="expired_year" id="expired_year" value="<?= (@$relawan->expired_year != null ? @$relawan->expired_year : date('Y') + 3) ?>" class="form-control" placeholder="Masukan Tahun. Contoh: 2027" required>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
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
        <div class="mb-3">
            <label class="form-label" for="foto">Foto</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$relawan->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/relawan/' . @$relawan->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <a href="<?= base_url('unit/relawan/unit?page=detail') ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>