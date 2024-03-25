<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('unit/event/pengajuan/save_pendamping')) ?>
        <input type="hidden" name="id_pendamping" value="<?= @$event_pendamping->id ?>">
        <input type="hidden" name="id_event_unit" value="<?= $_GET['id_event_unit'] ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pendamping</label>
            <div class="input-group input-group-merge">
                <input type="text" class="form-control" name="nama" value="<?= @$event_pendamping->nama ?>">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Foto</label>
            <div class="input-group input-group-merge">
                <input class="form-control foto" type="file" name="foto">
            </div>
            <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
            <input type="hidden" class="form-control" value="" value="<?= @$event_pendamping->foto ?>" name="gambar">
            <small class="text-primary">gunakan foto dengan background merah</small>
        </div>
        <div class="mb-3">
            <img src="<?= base_url('uploads/img/event/pendamping/' . @$event_pendamping->foto) ?>" height="200px" alt="">
        </div>
        <a href="<?= base_url('/unit/event/pengajuan?page=detail&id=') . $_GET['id_event_unit'] ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>