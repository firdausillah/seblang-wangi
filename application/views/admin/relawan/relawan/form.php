<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/relawan/relawan/save')) ?>
        <input type="hidden" name="id" value="<?= @$relawan->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <input type="text" name="nama" id="nama" value="<?= @$relawan->nama ?>" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="tahun_perolehan">Tahun Perolehan</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="tahun_perolehan" id="tahun_perolehan" value="<?= @$relawan->tahun_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 2024">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="nilai_perolehan">Nilai Perolehan</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="nilai_perolehan" id="nilai_perolehan" value="<?= @$relawan->nilai_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 200000000">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="sumber">Sumber</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="sumber" id="sumber" value="<?= @$relawan->sumber ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="merk">Merk</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="merk" id="merk" value="<?= @$relawan->merk ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="type">Type</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="type" id="type" value="<?= @$relawan->type ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="serial_number">Serial Number</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="serial_number" id="serial_number" value="<?= @$relawan->serial_number ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="jumlah">Jumlah</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="jumlah" id="jumlah" value="<?= @$relawan->jumlah ?>" class="form-control" placeholder="Masukan angka. Contoh: 20">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="kondisi">Kondisi</label>
                    <select class="form-select" name="kondisi" id="kondisi">
                        <option value="">--Pilih--</option>
                        <option <?= @$relawan->kondisi == 'Baik' ? 'selected' : '' ?> value="Baik">Baik</option>
                        <option <?= @$relawan->kondisi == 'Rusak' ? 'selected' : '' ?> value="Rusak">Rusak</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="pengguna">Pengguna</label>
            <div class="input-group input-group-merge">
                <input type="text" name="pengguna" id="pengguna" value="<?= @$relawan->pengguna ?>" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
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
        <a href="<?= base_url() ?>admin/relawan/relawan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>