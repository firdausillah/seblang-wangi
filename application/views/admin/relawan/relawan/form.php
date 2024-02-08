<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url((isset($_GET['unit']) ? 'admin/relawan/relawan/save?unit=' . $_GET['unit'] : 'admin/relawan/relawan/save?id_unit=' . $_GET['id_unit']))) ?>
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
                        <?php if ($_GET['page'] == 'add_relawan') : ?>
                            <option value="<?= $unit->id ?>" selected><?= $unit->nama ?></option>
                        <?php else : ?>
                            <option value="">--Pilih--</option>
                            <?php foreach ($unit as $key => $value) : ?>
                                <option <?= @$relawan->id_unit == $value->id ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->nama ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="is_active">Status</label>
                    <select class="form-select" name="is_active" id="is_active" width="100px">
                        <option value="">--Pilih--</option>
                        <option <?= @$relawan->is_active == '1' ? 'selected' : '' ?> value="1">Aktif</option>
                        <option <?= @$relawan->is_active == '0' ? 'selected' : '' ?> value="0">Nonaktif</option>
                        <option <?= @$relawan->is_active == '2' ? 'selected' : '' ?> value="2">Registrasi</option>
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
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" width="100px">
                        <option value="">--Pilih--</option>
                        <option <?= @$relawan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                        <option <?= @$relawan->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="nomor_telepon" id="nomor_telepon" value="<?= @$relawan->nomor_telepon ?>" class="form-control" placeholder="Masukan Nomor Telepon. Contoh: 085245123554">
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
        <a href="<?= base_url((isset($_GET['unit']) ? 'admin/relawan/relawan?unit=' . $_GET['unit'] : 'admin/relawan/unit?page=detail&id=' . $_GET['id_unit'])) ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>