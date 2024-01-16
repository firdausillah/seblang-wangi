<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/logistik/aset_tanah/save')) ?>
        <input type="hidden" name="id" value="<?= @$aset_tanah->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama Aset<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$aset_tanah->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat">Alamat <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <input type="text" name="alamat" id="alamat" value="<?= @$aset_tanah->alamat ?>" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="luas_tanah">Luas Tanah <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <input type="text" name="luas_tanah" id="luas_tanah" value="<?= @$aset_tanah->luas_tanah ?>" class="form-control" placeholder="Masukan Angka. Contoh: 200" required>
            </div>
            <div id="defaultFormControlHelp" class="form-text">
                M2
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tahun_perolehan">Tahun Perolehan <span class="text-danger">*</span></label>
            <input type="number" name="tahun_perolehan" id="tahun_perolehan" maxlength="4" value="<?= @$aset_tanah->tahun_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 2024" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nilai_perolehan">Nilai Perolehan <span class="text-danger">*</span></label>
            <input type="text" name="nilai_perolehan" id="nilai_perolehan" value="<?= @$aset_tanah->nilai_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 200000000" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="sumber">Sumber</label>
            <input type="text" name="sumber" id="sumber" value="<?= @$aset_tanah->sumber ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="status_kepemilikan">Status Kepemilikan <span class="text-danger">*</span></label>
            <select class="form-select" name="status_kepemilikan" id="status_kepemilikan" required>
                <option value="">--Pilih--</option>
                <option <?= @$aset_tanah->status_kepemilikan == 'Hak Guna/Hak Pakai' ? 'selected' : '' ?> value="Hak Guna/Hak Pakai">Hak Guna/Hak Pakai</option>
                <option <?= @$aset_tanah->status_kepemilikan == 'Hak Milik' ? 'selected' : '' ?> value="Hak Milik">Hak Milik</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan</label>
            <input type="text" name="keterangan" id="keterangan" value="<?= @$aset_tanah->keterangan_kepemilikan ?>" class="form-control" placeholder="keterangan">
        </div>
        <a href="<?= base_url() ?>admin/logistik/aset_tanah" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>