<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('unit/relawan/unit/save')) ?>
        <input type="hidden" name="id" value="<?= @$unit->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$unit->nama ?>" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="jenis">jenis unit</label>
                    <select class="form-select" name="jenis" id="jenis" width="100px">
                        <option value="">--Pilih--</option>
                        <option <?= @$unit->jenis == 'PMR' ? 'selected' : '' ?> value="PMR">PMR</option>
                        <option <?= @$unit->jenis == 'KSR' ? 'selected' : '' ?> value="KSR">KSR</option>
                        <option <?= @$unit->jenis == 'TSR' ? 'selected' : '' ?> value="TSR">TSR</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="kategori">kategori unit</label>
                    <select class="form-select" name="kategori" id="kategori" width="100px">
                        <option value="">--Pilih--</option>
                        <option <?= @$unit->kategori == 'MULA' ? 'selected' : '' ?> value="MULA">MULA</option>
                        <option <?= @$unit->kategori == 'MADYA' ? 'selected' : '' ?> value="MADYA">MADYA</option>
                        <option <?= @$unit->kategori == 'WIRA' ? 'selected' : '' ?> value="WIRA">WIRA</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="email">email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= @$unit->email ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="telepon">telepon <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="telepon" id="telepon" value="<?= @$unit->telepon ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="password">password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" value="<?= @$unit->password ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="alamat">alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= @$unit->alamat ?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="sk">Surat Keputusan</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control sk" type="file" name="sk">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$unit->sk ?>" name="file_sk">
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('uploads/file/unit/' . @$unit->sk) ?>" target="_blank" class="text-black">File SK : <span class="text-info"><?= @$unit->sk ?></span></a>
                    <!-- <embed type="application/pdf" src="<?= base_url('uploads/file/unit/' . @$unit->sk) ?>" width="600" height="400"></embed> -->
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= @$unit->keterangan ?>">
        </div>
        <a href="<?= base_url() ?>unit/relawan/unit?page=detail" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>