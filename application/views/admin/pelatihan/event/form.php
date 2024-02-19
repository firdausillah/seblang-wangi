<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/donor/mobile_unit/save')) ?>
            <input type="hidden" name="id" value="<?= @$mobile_unit->id ?>">
            <div class="mb-3">
                <label class="form-label" for="tanggal">Tanggal <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?=@$mobile_unit->tanggal?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nama_lembaga">Nama Lembaga <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_lembaga" id="nama_lembaga" value="<?=@$mobile_unit->nama_lembaga?>" placeholder="Nama Lembaga/Institusi/Komunitas/Sekolah">
            </div>
            <div class="mb-3">
                <label class="form-label" for="lokasi">Lokasi <span class="text-danger">*</span></label>
                <div class="input-group input-group-merge">
                    <input type="text" name="lokasi" id="lokasi" value="<?=@$mobile_unit->lokasi?>" class="form-control" placeholder="Tempat Kegiatan" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="jumlah_a">Golongan Darah A <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah_a" id="jumlah_a" value="<?=@$mobile_unit->jumlah_a?>" class="form-control" placeholder="Jumlah Golongan Darah A" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="jumlah_b">Golongan Darah B <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah_b" id="jumlah_b" value="<?=@$mobile_unit->jumlah_b?>" class="form-control" placeholder="Jumlah Golongan Darah B" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="jumlah_ab">Golongan Darah AB <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah_ab" id="jumlah_ab" value="<?=@$mobile_unit->jumlah_ab?>" class="form-control" placeholder="Jumlah Golongan Darah AB" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="jumlah_o">Golongan Darah O <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah_o" id="jumlah_o" value="<?=@$mobile_unit->jumlah_o?>" class="form-control" placeholder="Jumlah Golongan Darah O" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlah_kantong">Jumlah Kantong <span class="text-danger">*</span></label>
                <input type="number" name="jumlah_kantong" id="jumlah_kantong" value="<?=@$mobile_unit->jumlah_kantong?>" class="form-control" placeholder="Jumlah Kantong" required>
            </div>
            <a href="<?= base_url() ?>admin/donor/mobile_unit" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>