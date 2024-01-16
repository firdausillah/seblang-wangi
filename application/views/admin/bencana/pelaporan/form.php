<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/bencana/pelaporan/save')) ?>
        <input type="hidden" name="id" value="<?= @$pelaporan->id ?>">
        <div class="mb-3">
            <label class="form-label" for="tanggal">tanggal</label>
            <input type="datetime-local" class="form-control" name="tanggal" id="tanggal" value="<?= @$pelaporan->tanggal ?>">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="jalan">jalan</label>
                    <input type="text" class="form-control" name="jalan" id="jalan" value="<?= @$pelaporan->jalan ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="alamat">alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= @$pelaporan->alamat ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="kab_kota">kabupaten / kota</label>
                    <input type="text" class="form-control" name="kab_kota" id="kab_kota" value="Banyuwangi">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="provinsi">provinsi</label>
                    <input type="text" class="form-control" name="provinsi" id="provinsi" value="Jawa Timur">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="kejadian">jenis kejadian</label>
                    <select class="form-select" name="kejadian" id="kejadian" width="100px" required>
                        <option value="">--Pilih--</option>
                        <option <?= @$pelaporan->kejadian == 'Banjir' ? 'selected' : '' ?> value="Banjir">Banjir</option>
                        <option <?= @$pelaporan->kejadian == 'Banjir Bandang' ? 'selected' : '' ?> value="Banjir Bandang">Banjir Bandang</option>
                        <option <?= @$pelaporan->kejadian == 'Banjir Rob' ? 'selected' : '' ?> value="Banjir Rob">Banjir Rob</option>
                        <option <?= @$pelaporan->kejadian == 'Erupsi Gunung Berapi' ? 'selected' : '' ?> value="Erupsi Gunung Berapi">Erupsi Gunung Berapi</option>
                        <option <?= @$pelaporan->kejadian == 'Gempa Bumi' ? 'selected' : '' ?> value="Gempa Bumi">Gempa Bumi</option>
                        <option <?= @$pelaporan->kejadian == 'Hujan/Angin Kencang' ? 'selected' : '' ?> value="Hujan/Angin Kencang">Hujan/Angin Kencang</option>
                        <option <?= @$pelaporan->kejadian == 'Kebakaran' ? 'selected' : '' ?> value="Kebakaran">Kebakaran</option>
                        <option <?= @$pelaporan->kejadian == 'Kekeringan' ? 'selected' : '' ?> value="Kekeringan">Kekeringan</option>
                        <option <?= @$pelaporan->kejadian == 'Konflik Sosial' ? 'selected' : '' ?> value="Konflik Sosial">Konflik Sosial</option>
                        <option <?= @$pelaporan->kejadian == 'Longsor' ? 'selected' : '' ?> value="Longsor">Longsor</option>
                        <option <?= @$pelaporan->kejadian == 'Puting Beliung' ? 'selected' : '' ?> value="Puting Beliung">Puting Beliung</option>
                        <option <?= @$pelaporan->kejadian == 'Tanah Gerak' ? 'selected' : '' ?> value="Tanah Gerak">Tanah Gerak</option>
                        <option <?= @$pelaporan->kejadian == 'Tsunami' ? 'selected' : '' ?> value="Tsunami">Tsunami</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="kegiatan">Jenis Kegiatan (PB) <span class="text-danger">*</span></label>
                    <select class="form-select" name="kegiatan" id="kegiatan" width="100px" required>
                        <option value="">--Pilih--</option>
                        <option <?= @$pelaporan->pelaporan == 'Tidak Ada' ? 'selected' : '' ?> value="Tidak Ada">Tidak Ada</option>
                        <option <?= @$pelaporan->pelaporan == 'Assesment' ? 'selected' : '' ?> value="Assesment">Assesment</option>
                        <option <?= @$pelaporan->pelaporan == 'Distribusi Bantuan' ? 'selected' : '' ?> value="Distribusi Bantuan">Distribusi Bantuan</option>
                        <option <?= @$pelaporan->pelaporan == 'PP dan Evakuasi' ? 'selected' : '' ?> value="PP dan Evakuasi">PP dan Evakuasi</option>
                        <option <?= @$pelaporan->pelaporan == 'Respon Tanggap Darurat Bencana' ? 'selected' : '' ?> value="Respon Tanggap Darurat Bencana">Respon Tanggap Darurat Bencana</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_terdampak_kk">jumlah terdampak (kk)</label>
                    <input type="number" class="form-control" name="jumlah_terdampak_kk" id="jumlah_terdampak_kk" value="<?= @$pelaporan->jumlah_terdampak_kk ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_terdampak_jiwa">jumlah terdampak (jiwa)</label>
                    <input type="number" class="form-control" name="jumlah_terdampak_jiwa" id="jumlah_terdampak_jiwa" value="<?= @$pelaporan->jumlah_terdampak_jiwa ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_mengungsi_jiwa">jumlah mengungsi (jiwa)</label>
                    <input type="number" class="form-control" name="jumlah_mengungsi_jiwa" id="jumlah_mengungsi_jiwa" value="<?= @$pelaporan->jumlah_mengungsi_jiwa ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_luka_ringan">jumlah luka ringan</label>
                    <input type="number" class="form-control" name="jumlah_luka_ringan" id="jumlah_luka_ringan" value="<?= @$pelaporan->jumlah_luka_ringan ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_luka_berat">jumlah luka berat</label>
                    <input type="number" class="form-control" name="jumlah_luka_berat" id="jumlah_luka_berat" value="<?= @$pelaporan->jumlah_luka_berat ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_meninggal">jumlah meninggal</label>
                    <input type="number" class="form-control" name="jumlah_meninggal" id="jumlah_meninggal" value="<?= @$pelaporan->jumlah_meninggal ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_hilang">jumlah hilang</label>
                    <input type="number" class="form-control" name="jumlah_hilang" id="jumlah_hilang" value="<?= @$pelaporan->jumlah_hilang ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_rumah_rusak_berat">jumlah rumah rusak berat</label>
                    <input type="number" class="form-control" name="jumlah_rumah_rusak_berat" id="jumlah_rumah_rusak_berat" value="<?= @$pelaporan->jumlah_rumah_rusak_berat ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_rumah_rusak_sedang">jumlah rumah rusak sedang</label>
                    <input type="number" class="form-control" name="jumlah_rumah_rusak_sedang" id="jumlah_rumah_rusak_sedang" value="<?= @$pelaporan->jumlah_rumah_rusak_sedang ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_rumah_rusak_ringan">jumlah rumah rusak ringan</label>
                    <input type="number" class="form-control" name="jumlah_rumah_rusak_ringan" id="jumlah_rumah_rusak_ringan" value="<?= @$pelaporan->jumlah_rumah_rusak_ringan ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_jalan_rusak">jumlah jalan rusak</label>
                    <input type="number" class="form-control" name="jumlah_jalan_rusak" id="jumlah_jalan_rusak" value="<?= @$pelaporan->jumlah_jalan_rusak ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_jembatan">jumlah jembatan</label>
                    <input type="number" class="form-control" name="jumlah_jembatan" id="jumlah_jembatan" value="<?= @$pelaporan->jumlah_jembatan ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_faskes">jumlah faskes</label>
                    <input type="number" class="form-control" name="jumlah_faskes" id="jumlah_faskes" value="<?= @$pelaporan->jumlah_faskes ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_fasilitas_pendidikan">jumlah fasilitas pendidikan</label>
                    <input type="number" class="form-control" name="jumlah_fasilitas_pendidikan" id="jumlah_fasilitas_pendidikan" value="<?= @$pelaporan->jumlah_fasilitas_pendidikan ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_tempat_ibadah">jumlah tempat ibadah</label>
                    <input type="number" class="form-control" name="jumlah_tempat_ibadah" id="jumlah_tempat_ibadah" value="<?= @$pelaporan->jumlah_tempat_ibadah ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_fasilitas_umum">jumlah fasilitas umum lain</label>
                    <input type="number" class="form-control" name="jumlah_fasilitas_umum" id="jumlah_fasilitas_umum" value="<?= @$pelaporan->jumlah_fasilitas_umum ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="akses_telepon_internet">akses telepon / internet <span class="text-danger">*</span></label>
                    <select class="form-select" name="akses_telepon_internet" id="akses_telepon_internet" width="100px" required>
                        <option value="">--Pilih--</option>
                        <option <?= @$pelaporan->akses_telepon_internet == 'Berfungsi' ? 'selected' : '' ?> value="Berfungsi">Berfungsi</option>
                        <option <?= @$pelaporan->akses_telepon_internet == 'Tidak Berfungsi' ? 'selected' : '' ?> value="Tidak Berfungsi">Tidak Berfungsi</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="akses_listrik">akses listrik</label>
                    <select class="form-select" name="akses_listrik" id="akses_listrik" width="100px" required>
                        <option value="">--Pilih--</option>
                        <option <?= @$pelaporan->akses_listrik == 'Berfungsi' ? 'selected' : '' ?> value="Berfungsi">Berfungsi</option>
                        <option <?= @$pelaporan->akses_listrik == 'Tidak Berfungsi' ? 'selected' : '' ?> value="Tidak Berfungsi">Tidak Berfungsi</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="akses_air_bersih">akses air bersih</label>
                    <select class="form-select" name="akses_air_bersih" id="akses_air_bersih" width="100px" required>
                        <option value="">--Pilih--</option>
                        <option <?= @$pelaporan->akses_air_bersih == 'Berfungsi' ? 'selected' : '' ?> value="Berfungsi">Berfungsi</option>
                        <option <?= @$pelaporan->akses_air_bersih == 'Tidak Berfungsi' ? 'selected' : '' ?> value="Tidak Berfungsi">Tidak Berfungsi</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="food_item">food item</label>
                    <input type="number" class="form-control" name="food_item" id="food_item" value="<?= @$pelaporan->food_item ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="non_food_item">non food item</label>
                    <input type="number" class="form-control" name="non_food_item" id="non_food_item" value="<?= @$pelaporan->non_food_item ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_penerima_manfaat">jumlah penerima manfaat</label>
                    <input type="number" class="form-control" name="jumlah_penerima_manfaat" id="jumlah_penerima_manfaat" value="<?= @$pelaporan->jumlah_penerima_manfaat ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_laki_laki">jumlah laki laki</label>
                    <input type="number" class="form-control" name="jumlah_laki_laki" id="jumlah_laki_laki" value="<?= @$pelaporan->jumlah_laki_laki ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="jumlah_perempuan">jumlah perempuan</label>
                    <input type="number" class="form-control" name="jumlah_perempuan" id="jumlah_perempuan" value="<?= @$pelaporan->jumlah_perempuan ?>" placeholder="Masukan Angka. Contoh: 10">
                </div>
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
                    <input type="hidden" class="form-control" value="<?= @$pelaporan->foto ?>" name="gambar">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/pelaporan/' . @$pelaporan->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"><?= @$pelaporan->keterangan ?></textarea>
        </div>
        <a href="<?= base_url() ?>admin/bencana/pelaporan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>