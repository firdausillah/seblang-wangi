<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/pelatihan/event/save')) ?>
        <input type="hidden" name="id" value="<?= @$event->id ?>">
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
                    <img src="<?= base_url('uploads/img/event/' . @$event->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <div class="input-group input-group-merge">
                <input type="text" name="keterangan" id="keterangan" value="<?= @$event->keterangan ?>" class="form-control">
            </div>
        </div>
        <a href="<?= base_url() ?>admin/pelatihan/event" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>