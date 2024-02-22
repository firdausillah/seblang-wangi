<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('unit/relawan/unit/save_kordinator')) ?>
        <input type="hidden" name="id_unit" value="<?= @$_GET['id_unit'] ?>">
        <input type="hidden" name="id" value="<?= @$unit_kordinator->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$unit_kordinator->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tahun_mulai">Tahun Mulai</label>
            <div class="input-group input-group-merge">
                <input type="text" name="tahun_mulai" id="tahun_mulai" value="<?= (@$unit_kordinator->tahun_mulai != null ? @$unit_kordinator->tahun_mulai : date('Y')) ?>" class="form-control" placeholder="Masukan Tahun. Contoh: 2024">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tahun_selesai">Tahun Selesai</label>
            <div class="input-group input-group-merge">
                <input type="text" name="tahun_selesai" id="tahun_selesai" value="<?= (@$unit_kordinator->tahun_selesai != null ? @$unit_kordinator->tahun_selesai : date('Y') + 3) ?>" class="form-control" placeholder="Masukan Tahun. Contoh: 2027">
            </div>
        </div>
        <a href="<?= base_url('unit/relawan/unit?page=detail') ?>" class=" btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>