<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail <?= @$event->nama ?></h5>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap mt-2">
            <table id="table" class="table table-hover">
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>Nama Event</td>
                        <td>:</td>
                        <td><?= @$event->nama ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Event</td>
                        <td>:</td>
                        <td><?= @$event->jenis ?></td>
                    </tr>
                    <tr>
                        <td>Periode Pendaftaran</td>
                        <td>:</td>
                        <td><?= (@$event->tanggal_buka_pendaftaran == '0000-00-00' ? '' : date('d M Y', strtotime(@$event->tanggal_buka_pendaftaran))) . ' s/d ' . (@$event->tanggal_tutup_pendaftaran == '0000-00-00' ? '' : date('d M Y', strtotime(@$event->tanggal_tutup_pendaftaran))) ?></td>
                    </tr>
                    <tr>
                        <td>Poster</td>
                        <td>:</td>
                        <td>
                            <a href="<?= base_url('uploads/img/event/' . @$event->foto) ?>" target="_blank"><img src="<?= base_url('uploads/img/event/' . @$event->foto) ?>" height="200px" alt=""></a>
                        </td>
                    </tr>
                    <tr>
                        <td>File Informasi</td>
                        <td>:</td>
                        <td>
                            <a href="<?= base_url('uploads/file/event/' . @$event->file_info) ?>" target="_blank"><span class="text-info"><?= @$event->file_info ?></span></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?= @$event->keterangan ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <a href="<?= base_url('relawan/pelatihan/event') ?>" class=" btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>