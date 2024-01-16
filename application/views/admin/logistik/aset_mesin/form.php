<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/logistik/aset_mesin/save')) ?>
        <input type="hidden" name="id" value="<?= @$aset_mesin->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <input type="text" name="nama" id="nama" value="<?= @$aset_mesin->nama ?>" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="tahun_perolehan">Tahun Perolehan</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="tahun_perolehan" id="tahun_perolehan" value="<?= @$aset_mesin->tahun_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 2024">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="nilai_perolehan">Nilai Perolehan</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="nilai_perolehan" id="nilai_perolehan" value="<?= @$aset_mesin->nilai_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 200000000">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="sumber">Sumber</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="sumber" id="sumber" value="<?= @$aset_mesin->sumber ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="merk">Merk</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="merk" id="merk" value="<?= @$aset_mesin->merk ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="type">Type</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="type" id="type" value="<?= @$aset_mesin->type ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="serial_number">Serial Number</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="serial_number" id="serial_number" value="<?= @$aset_mesin->serial_number ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="jumlah">Jumlah</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="jumlah" id="jumlah" value="<?= @$aset_mesin->jumlah ?>" class="form-control" placeholder="Masukan angka. Contoh: 20">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="kondisi">Kondisi</label>
                    <select class="form-select" name="kondisi" id="kondisi">
                        <option value="">--Pilih--</option>
                        <option <?= @$aset_mesin->kondisi == 'Baik' ? 'selected' : '' ?> value="Baik">Baik</option>
                        <option <?= @$aset_mesin->kondisi == 'Rusak' ? 'selected' : '' ?> value="Rusak">Rusak</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="status_kepemilikan">Status Kepemilikan <span class="text-danger">*</span></label>
            <select class="form-select" name="status_kepemilikan" id="status_kepemilikan" required>
                <option value="">--Pilih--</option>
                <option <?= @$aset_mesin->status_kepemilikan == 'PMI Kabupaten/Kota' ? 'selected' : '' ?> value="PMI Kabupaten/Kota">PMI Kabupaten/Kota</option>
                <option <?= @$aset_mesin->status_kepemilikan == 'PMI Provinsi' ? 'selected' : '' ?> value="PMI Provinsi">PMI Provinsi</option>
                <option <?= @$aset_mesin->status_kepemilikan == 'PMI Pusat' ? 'selected' : '' ?> value="PMI Pusat">PMI Pusat</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <div class="input-group input-group-merge">
                <input type="text" name="keterangan" id="keterangan" value="<?= @$aset_mesin->keterangan ?>" class="form-control">
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
                    <input type="hidden" class="form-control" value="<?= @$aset_mesin->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/aset_mesin/' . @$aset_mesin->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <a href="<?= base_url() ?>admin/logistik/aset_mesin" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>