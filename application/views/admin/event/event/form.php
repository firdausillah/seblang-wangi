<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/event/event/save')) ?>
        <input type="hidden" name="id" value="<?= @$event->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama Event <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$event->nama ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="jenis">Jenis Event <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <select class="form-select" name="jenis" id="jenis" required>
                    <option value="">--Pilih--</option>
                    <option <?= @$event->jenis == 'Pelatihan' ? 'selected' : '' ?> value="Pelatihan">Pelatihan</option>
                    <option <?= @$event->jenis == 'Lomba' ? 'selected' : '' ?> value="Lomba">Lomba</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nama">Nama Event <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$event->nama ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="tanggal_buka_pendaftaran">tanggal pendaftaran dibuka <span class="text-danger">*</span></label>
            <input type="date" name="tanggal_buka_pendaftaran" id="tanggal_buka_pendaftaran" value="<?= @$event->tanggal_buka_pendaftaran ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tanggal_tutup_pendaftaran">tanggal pendaftaran ditutup <span class="text-danger">*</span></label>
            <input type="date" name="tanggal_tutup_pendaftaran" id="tanggal_tutup_pendaftaran" value="<?= @$event->tanggal_tutup_pendaftaran ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Poster</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$event->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/event/admin/' . @$event->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="file_info">File Informasi</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control file_info" type="file" name="file_info">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$event->file_info ?>" name="file_info_name">
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('uploads/file/event/admin/' . @$event->file_info) ?>" target="_blank" class="text-black">File Informasi : <span class="text-info"><?= @$event->file_info ?></span></a>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <div class="input-group input-group-merge">
                <input type="text" name="keterangan" id="keterangan" value="<?= @$event->keterangan ?>" class="form-control">
            </div>
        </div>
        <a href="<?= base_url() ?>admin/event/event" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>