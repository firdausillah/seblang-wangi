<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/donor/penghargaan/save')) ?>
        <input type="hidden" name="id" value="<?= @$penghargaan->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$penghargaan->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="">--Pilih--</option>
                <option <?= @$penghargaan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?> value="Laki-laki">Laki-laki</option>
                <option <?= @$penghargaan->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= @$penghargaan->tempat_lahir ?>" class="form-control" placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= @$penghargaan->tanggal_lahir ?>" class="form-control" placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="<?= @$penghargaan->alamat ?>" class="form-control" placeholder="Alamat">
        </div>
        <div class="mb-3">
            <label class="form-label" for="penghargaan">Penghargaan <span class="text-danger">*</span></label>
            <select class="form-select" name="penghargaan" id="penghargaan" width="100px" required>
                <option value="">--Pilih--</option>
                <option <?= @$penghargaan->penghargaan == '10' ? 'selected' : '' ?> value="10">10</option>
                <option <?= @$penghargaan->penghargaan == '25' ? 'selected' : '' ?> value="25">25</option>
                <option <?= @$penghargaan->penghargaan == '50' ? 'selected' : '' ?> value="50">50</option>
                <option <?= @$penghargaan->penghargaan == '75' ? 'selected' : '' ?> value="75">75</option>
                <option <?= @$penghargaan->penghargaan == '100' ? 'selected' : '' ?> value="100">100</option>
            </select>
        </div>
        <a href="<?= base_url() ?>admin/donor/penghargaan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>