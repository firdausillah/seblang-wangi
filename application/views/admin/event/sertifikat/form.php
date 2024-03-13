<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/event/sertifikat/save')) ?>
        <input type="hidden" name="id" value="<?= @$sertifikat->id ?>">
        <!-- <div class="mb-3">
            <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
            <div class="input-group input-group-merge">
                <input type="text" name="nama" id="nama" value="<?= @$sertifikat->nama ?>" class="form-control" required>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="pelatihan_nama">nama pelatihan <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="pelatihan_nama" id="pelatihan_nama" required>
                            <option value="">--Pilih--</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Orientasi Kepalangmerahan' ? 'selected' : '' ?> value="Orientasi Kepalangmerahan">Orientasi Kepalangmerahan</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Fasilitator Pembinaan PMR / TOF Pembina PMR' ? 'selected' : '' ?> value="Fasilitator Pembinaan PMR / TOF Pembina PMR">Fasilitator Pembinaan PMR / TOF Pembina PMR</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan TOT General' ? 'selected' : '' ?> value="Pelatihan TOT General">Pelatihan TOT General</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Pertolongan Pertama Basic / Dasar' ? 'selected' : '' ?> value="Pelatihan Pertolongan Pertama Basic / Dasar">Pelatihan Pertolongan Pertama Basic / Dasar</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Pertolongan Pertama Intermediate / Menengah' ? 'selected' : '' ?> value="Pelatihan Pertolongan Pertama Intermediate / Menengah">Pelatihan Pertolongan Pertama Intermediate / Menengah</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Pertolongan Pertama Advance / Mahir' ? 'selected' : '' ?> value="Pelatihan Pertolongan Pertama Advance / Mahir">Pelatihan Pertolongan Pertama Advance / Mahir</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Manajemen Tanggap Darurat Bencana' ? 'selected' : '' ?> value="Pelatihan Manajemen Tanggap Darurat Bencana">Pelatihan Manajemen Tanggap Darurat Bencana</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Tim Ambulance' ? 'selected' : '' ?> value="Pelatihan Tim Ambulance">Pelatihan Tim Ambulance</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Assesment' ? 'selected' : '' ?> value="Pelatihan Assesment">Pelatihan Assesment</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Restory Family Link' ? 'selected' : '' ?> value="Pelatihan Restory Family Link">Pelatihan Restory Family Link</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Dapur Umum' ? 'selected' : '' ?> value="Pelatihan Dapur Umum">Pelatihan Dapur Umum</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Penampungan Dan Pengungsian / Shelter' ? 'selected' : '' ?> value="Pelatihan Penampungan Dan Pengungsian / Shelter">Pelatihan Penampungan Dan Pengungsian / Shelter</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Psycho Sosial Support' ? 'selected' : '' ?> value="Pelatihan Psycho Sosial Support">Pelatihan Psycho Sosial Support</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Manajemen Posko' ? 'selected' : '' ?> value="Pelatihan Manajemen Posko">Pelatihan Manajemen Posko</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan KBBM Sibat' ? 'selected' : '' ?> value="Pelatihan KBBM Sibat">Pelatihan KBBM Sibat</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan Kuat' ? 'selected' : '' ?> value="Pelatihan Kuat">Pelatihan Kuat</option>
                            <option <?= @$sertifikat->pelatihan_nama == 'Pelatihan KSR Dasar' ? 'selected' : '' ?> value="Pelatihan KSR Dasar">Pelatihan KSR Dasar</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="jenis">jenis <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="jenis" id="jenis" required>
                            <option value="">--Pilih--</option>
                            <option <?= @$sertifikat->jenis == 'Piagam Penghargaan' ? 'selected' : '' ?> value="Piagam Penghargaan">Piagam Penghargaan</option>
                            <option <?= @$sertifikat->jenis == 'Sertifikat' ? 'selected' : '' ?> value="Sertifikat">Sertifikat</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="nama">nama <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="nama" id="nama" value="<?= @$sertifikat->nama ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="nomor">nomor <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="nomor" id="nomor" value="<?= @$sertifikat->nomor ?>" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="sebagai">sebagai <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="sebagai" id="sebagai" required>
                            <option value="">--Pilih--</option>
                            <option <?= @$sertifikat->sebagai == 'Asesor' ? 'selected' : '' ?> value="Asesor">Asesor</option>
                            <option <?= @$sertifikat->sebagai == 'Fasilitator' ? 'selected' : '' ?> value="Fasilitator">Fasilitator</option>
                            <option <?= @$sertifikat->sebagai == 'Pelatih' ? 'selected' : '' ?> value="Pelatih">Pelatih</option>
                            <option <?= @$sertifikat->sebagai == 'Pendamping' ? 'selected' : '' ?> value="Pendamping">Pendamping</option>
                            <option <?= @$sertifikat->sebagai == 'Peserta' ? 'selected' : '' ?> value="Peserta">Peserta</option>
                            <option <?= @$sertifikat->sebagai == 'Narasumber' ? 'selected' : '' ?> value="Narasumber">Narasumber</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="penyelenggara">penyelenggara <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="penyelenggara" id="penyelenggara" required>
                            <option value="">--Pilih--</option>
                            <option <?= @$sertifikat->penyelenggara == 'PMI' ? 'selected' : '' ?> value="PMI">PMI</option>
                            <option <?= @$sertifikat->penyelenggara == 'Non PMI' ? 'selected' : '' ?> value="Non PMI">Non PMI</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="penyelenggara_nama">nama penyelenggara <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="penyelenggara_nama" id="penyelenggara_nama" value="<?= @$sertifikat->penyelenggara_nama ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="tahun">tahun <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="tahun" id="tahun" value="<?= @$sertifikat->tahun ?>" class="form-control" placeholder="Masukan Tahun. Contoh: 2024" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="keterangan">keterangan <span class="text-danger">*</span></label></label>
                    <div class="input-group input-group-merge">
                        <select class="form-select" name="keterangan" id="keterangan" required>
                            <option value="">--Pilih--</option>
                            <option <?= @$sertifikat->keterangan == 'Lulus' ? 'selected' : '' ?> value="Lulus">Lulus</option>
                            <option <?= @$sertifikat->keterangan == 'Kompeten' ? 'selected' : '' ?> value="Kompeten">Kompeten</option>
                            <option <?= @$sertifikat->keterangan == 'Sangat Memuaskan' ? 'selected' : '' ?> value="Sangat Memuaskan">Sangat Memuaskan</option>
                            <option <?= @$sertifikat->keterangan == 'Sangat Baik' ? 'selected' : '' ?> value="Sangat Baik">Sangat Baik</option>
                            <option <?= @$sertifikat->keterangan == 'Baik' ? 'selected' : '' ?> value="Baik">Baik</option>
                            <option <?= @$sertifikat->keterangan == 'Cukup' ? 'selected' : '' ?> value="Cukup">Cukup</option>
                            <option <?= @$sertifikat->keterangan == 'Lulus Bersyarat' ? 'selected' : '' ?> value="Lulus Bersyarat">Lulus Bersyarat</option>
                            <option <?= @$sertifikat->keterangan == 'Tanpa Keterangan' ? 'selected' : '' ?> value="Tanpa Keterangan">Tanpa Keterangan</option>
                            <option <?= @$sertifikat->keterangan == 'Tidak Lulus' ? 'selected' : '' ?> value="Tidak Lulus">Tidak Lulus</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="nilai_akhir">nilai akhir</label>
                    <div class="input-group input-group-merge">
                        <input type="number" step="any" name="nilai_akhir" id="nilai_akhir" value="<?= @$sertifikat->nilai_akhir ?>" class="form-control" placeholder="Masukan angka. Contoh: 85">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="kegiatan_tempat">tempat kegiatan</label>
                    <div class="input-group input-group-merge">
                        <input type="text" name="kegiatan_tempat" id="kegiatan_tempat" value="<?= @$sertifikat->kegiatan_tempat ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="kegiatan_tanggal">tanggal kegiatan</label>
                    <div class="input-group input-group-merge">
                        <input type="date" name="kegiatan_tanggal" id="kegiatan_tanggal" value="<?= @$sertifikat->kegiatan_tanggal ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="standart_minimum_kelulusan">standart minimum kelulusan</label>
            <div class="input-group input-group-merge">
                <input type="number" step="any" name="standart_minimum_kelulusan" id="standart_minimum_kelulusan" value="<?= @$sertifikat->standart_minimum_kelulusan ?>" class="form-control" placeholder="Masukan angka. Contoh: 85">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="file">File Sertifikat <span class="text-danger">*</span></label></label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control file" type="file" name="file">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$sertifikat->file ?>" name="file_name">
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('uploads/file/sertifikat/' . @$sertifikat->file) ?>" target="_blank" class="text-black">File Sertifikat : <span class="text-info"><?= @$sertifikat->file ?></span></a>
                </div>
            </div>
        </div>
        <a href="<?= base_url() ?>admin/event/sertifikat" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>