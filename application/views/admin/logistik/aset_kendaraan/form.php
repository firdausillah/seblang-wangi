<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/logistik/aset_kendaraan/save')) ?>
        <input type="hidden" name="id" value="<?= @$aset_kendaraan->id ?>">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="type">Type <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="type" id="type" value="<?= @$aset_kendaraan->type ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="merk">Merk <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="merk" id="merk" value="<?= @$aset_kendaraan->merk ?>" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="status_kepemilikan">Status Kepemilikan <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="status_kepemilikan" id="status_kepemilikan">
                            <option value="">--Pilih--</option>
                            <option <?= @$aset_kendaraan->status_kepemilikan == 'Hak Milik' ? 'selected' : '' ?> value="Hak Milik">Hak Milik</option>
                            <option <?= @$aset_kendaraan->status_kepemilikan == 'Pinjam Pakai' ? 'selected' : '' ?> value="Pinjam Pakai">Pinjam Pakai</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="jenis_kendaraan">Jenis Kendaraan <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="jenis_kendaraan" id="jenis_kendaraan" required>
                            <option value="">--Pilih--</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Ambulans' ? 'selected' : '' ?> value="Ambulans">Ambulans</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Mobil Operasional' ? 'selected' : '' ?> value="Mobil Operasional">Mobil Operasional</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Mobil Box' ? 'selected' : '' ?> value="Mobil Box">Mobil Box</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Mobil Pick Up' ? 'selected' : '' ?> value="Mobil Pick Up">Mobil Pick Up</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Moto Roda 2' ? 'selected' : '' ?> value="Moto Roda 2">Moto Roda 2</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Moto Roda 3' ? 'selected' : '' ?> value="Moto Roda 3">Moto Roda 3</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Mobil Tangki Air' ? 'selected' : '' ?> value="Mobil Tangki Air">Mobil Tangki Air</option>
                            <option <?= @$aset_kendaraan->jenis_kendaraan == 'Truk' ? 'selected' : '' ?> value="Truk">Truk</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="tahun_produksi">Tahun Produksi</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="tahun_produksi" id="tahun_produksi" value="<?= @$aset_kendaraan->tahun_produksi ?>" class="form-control" placeholder="Masukan Angka. Contoh: 2024">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="tahun_perolehan">Tahun Perolehan</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="tahun_perolehan" id="tahun_perolehan" value="<?= @$aset_kendaraan->tahun_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 2024">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="nilai_perolehan">Nilai Perolehan</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="nilai_perolehan" id="nilai_perolehan" value="<?= @$aset_kendaraan->nilai_perolehan ?>" class="form-control" placeholder="Masukan Angka. Contoh: 50000000">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="tanggal_pajak_tahunan">Tanggal Pajak Tahunan</label>
                    <div class="input-group input-group-merge">
                        <input type="date" name="tanggal_pajak_tahunan" id="tanggal_pajak_tahunan" value="<?= @$aset_kendaraan->tanggal_pajak_tahunan ?>" class="form-control">
                    </div>
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label" for="jumlah">Jumlah</label>
                    <div class="input-group input-group-merge">
                        <input type="number" name="jumlah" id="jumlah" value="<?= @$aset_kendaraan->jumlah ?>" class="form-control">
                    </div>
                </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="kondisi">kondisi</label>
                    <select class="form-select" name="kondisi" id="kondisi">
                        <option value="">--Pilih--</option>
                        <option <?= @$aset_kendaraan->kondisi == 'Baik' ? 'selected' : '' ?> value="Baik">Baik</option>
                        <option <?= @$aset_kendaraan->kondisi == 'Rusak' ? 'selected' : '' ?> value="Rusak">Rusak</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="jenis_bbm">Jenis BBM</label>
                    <select class="form-select" name="jenis_bbm" id="jenis_bbm">
                        <option value="">--Pilih--</option>
                        <option <?= @$aset_kendaraan->jenis_bbm == 'Solar' ? 'selected' : '' ?> value="Solar">Solar</option>
                        <option <?= @$aset_kendaraan->jenis_bbm == 'Pertalite' ? 'selected' : '' ?> value="Pertalite">Pertalite</option>
                        <option <?= @$aset_kendaraan->jenis_bbm == 'Pertamax' ? 'selected' : '' ?> value="Pertamax">Pertamax</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="no_plat">No. Plat <span class="text-danger">*</span></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="no_plat" id="no_plat" value="<?= @$aset_kendaraan->no_plat ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="no_rangka">No. Rangka</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="no_rangka" id="no_rangka" value="<?= @$aset_kendaraan->no_rangka ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="no_mesin">No. Mesin</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="no_mesin" id="no_mesin" value="<?= @$aset_kendaraan->no_mesin ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="no_bpkb">No. BPKB</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="no_bpkb" id="no_bpkb" value="<?= @$aset_kendaraan->no_bpkb ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <div class="input-group input-group-merge">
                <input type="text" name="keterangan" id="keterangan" value="<?= @$aset_kendaraan->keterangan ?>" class="form-control">
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
                    <input type="hidden" class="form-control" value="<?= @$aset_kendaraan->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/aset_kendaraan/' . @$aset_kendaraan->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <a href="<?= base_url() ?>admin/logistik/aset_kendaraan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>