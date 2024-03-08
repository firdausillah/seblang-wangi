<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/yankes/' . $jenis_pelayanan . '/save')) ?>
        <input type="hidden" name="id" value="<?= @$pelayanan_kesehatan_sosial->id ?>">

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="kategori_pelayanan">Kategori Pelayanan <span class="text-danger">*</span></label>
                    <select class="form-select" name="kategori_pelayanan" id="kategori_pelayanan" width="100px" required>
                        <option value="">--Pilih--</option>
                        <?php foreach ($kategori_pelayanan as $value) : ?>
                            <option <?= @$pelayanan_kesehatan_sosial->kategori_pelayanan == $value ? 'selected' : '' ?> value='<?= $value ?>'><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="tempat">tempat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="tempat" id="tempat" value="<?= @$pelayanan_kesehatan_sosial->tempat ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="tanggal_mulai">tanggal mulai <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" value="<?= @$pelayanan_kesehatan_sosial->tanggal_mulai ?>" required>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="tanggal_selesai">tanggal selesai <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="<?= @$pelayanan_kesehatan_sosial->tanggal_selesai ?>" required>
                </div>
            </div>
        </div>
        <h6 class="mb-2 text-center">Jumlah Terdampak</h6>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_kk">jumlah KK</label>
                    <input type="text" class="form-control" name="jumlah_kk" id="jumlah_kk" value="<?= @$pelayanan_kesehatan_sosial->jumlah_kk ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_jiwa">jumlah jiwa</label>
                    <input type="text" class="form-control" name="jumlah_jiwa" id="jumlah_jiwa" value="<?= @$pelayanan_kesehatan_sosial->jumlah_jiwa ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_laki_laki">jumlah laki laki</label>
                    <input type="text" class="form-control" name="jumlah_laki_laki" id="jumlah_laki_laki" value="<?= @$pelayanan_kesehatan_sosial->jumlah_laki_laki ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_perempuan">jumlah perempuan</label>
                    <input type="text" class="form-control" name="jumlah_perempuan" id="jumlah_perempuan" value="<?= @$pelayanan_kesehatan_sosial->jumlah_perempuan ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_bayi">jumlah bayi</label>
                    <input type="text" class="form-control" name="jumlah_bayi" id="jumlah_bayi" value="<?= @$pelayanan_kesehatan_sosial->jumlah_bayi ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_balita">jumlah balita</label>
                    <input type="text" class="form-control" name="jumlah_balita" id="jumlah_balita" value="<?= @$pelayanan_kesehatan_sosial->jumlah_balita ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_anak">jumlah anak</label>
                    <input type="text" class="form-control" name="jumlah_anak" id="jumlah_anak" value="<?= @$pelayanan_kesehatan_sosial->jumlah_anak ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_remaja">jumlah remaja</label>
                    <input type="text" class="form-control" name="jumlah_remaja" id="jumlah_remaja" value="<?= @$pelayanan_kesehatan_sosial->jumlah_remaja ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_dewasa">jumlah dewasa</label>
                    <input type="text" class="form-control" name="jumlah_dewasa" id="jumlah_dewasa" value="<?= @$pelayanan_kesehatan_sosial->jumlah_dewasa ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_lansia">jumlah lansia</label>
                    <input type="text" class="form-control" name="jumlah_lansia" id="jumlah_lansia" value="<?= @$pelayanan_kesehatan_sosial->jumlah_lansia ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_disabilitas">jumlah disabilitas</label>
                    <input type="text" class="form-control" name="jumlah_disabilitas" id="jumlah_disabilitas" value="<?= @$pelayanan_kesehatan_sosial->jumlah_disabilitas ?>">
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_ibu_hamil">jumlah ibu hamil</label>
                    <input type="text" class="form-control" name="jumlah_ibu_hamil" id="jumlah_ibu_hamil" value="<?= @$pelayanan_kesehatan_sosial->jumlah_ibu_hamil ?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Foto <span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$pelayanan_kesehatan_sosial->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/yankes/' . $jenis_pelayanan . '/' . @$pelayanan_kesehatan_sosial->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"><?= @$pelayanan_kesehatan_sosial->keterangan ?></textarea>
        </div>
        <a href="<?= base_url('admin/yankes/' . $jenis_pelayanan) ?>" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>