<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/logistik/barang_darurat_bencana/save')) ?>
        <input type="hidden" name="id" value="<?= @$barang_darurat_bencana->id ?>">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Barang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= @$barang_darurat_bencana->nama ?>" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="merk">Merk</label>
                    <input type="text" class="form-control" name="merk" id="merk" value="<?= @$barang_darurat_bencana->merk ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="stok_akhir">Stok Akhir</label>
                    <input type="number" class="form-control" name="stok_akhir" id="stok_akhir" value="<?= @$barang_darurat_bencana->stok_akhir ?>" placeholder="Masukan Angka. Contoh: 200">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="satuan">Satuan</label>
                    <input type="text" class="form-control" name="satuan" id="satuan" value="<?= @$barang_darurat_bencana->satuan ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= @$barang_darurat_bencana->tanggal ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="sirkulasi">Sirkulasi</label>
                    <input type="text" class="form-control" name="sirkulasi" id="sirkulasi" value="<?= @$barang_darurat_bencana->sirkulasi ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="donor">Donor</label>
                    <input type="text" class="form-control" name="donor" id="donor" value="<?= @$barang_darurat_bencana->donor ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="dari">Dari</label>
                    <input type="text" class="form-control" name="dari" id="dari" value="<?= @$barang_darurat_bencana->dari ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="tanggal_expired">Tanggal Expired</label>
                    <input type="date" class="form-control" name="tanggal_expired" id="tanggal_expired" value="<?= @$barang_darurat_bencana->tanggal_expired ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="expired">Expired</label>
                    <input type="date" class="form-control" name="expired" id="expired" value="<?= @$barang_darurat_bencana->expired ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="stok_awal">Stok Awal</label>
                    <input type="number" class="form-control" name="stok_awal" id="stok_awal" value="<?= @$barang_darurat_bencana->stok_awal ?>" placeholder="Masukan Angka. Contoh: 200">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= @$barang_darurat_bencana->jumlah ?>" placeholder="Masukan Angka. Contoh: 200">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= @$barang_darurat_bencana->keterangan ?>">
        </div>
        <a href="<?= base_url() ?>admin/logistik/barang_darurat_bencana" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>