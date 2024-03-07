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
        <?= (((date('Y-m-d') >  @$event->tanggal_buka_pendaftaran && date('Y-m-d') <  @$event->tanggal_tutup_pendaftaran) && (@$event_peserta->is_active != 1 && @$event_peserta->is_active != 2)) ? '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDaftar"> Daftar </button>' : '<a href="#" class=" btn btn-primary disabled" aria-disabled="true">Daftar</a>') ?>
        <?php //(((date('Y-m-d') >  @$event->tanggal_buka_pendaftaran && date('Y-m-d') <  @$event->tanggal_tutup_pendaftaran) && (@$event_peserta->is_active != 1 && @$event_peserta->is_active != 2)) ? '<a href="' . base_url('relawan/pelatihan/event_peserta/save?id_relawan=' . $_SESSION['id'] . '&id_event=' . @$event->id) . '" class=" btn btn-primary">Daftar</a>' : '<a href="#" class=" btn btn-primary disabled" aria-disabled="true">Daftar</a>') 
        ?>

        <a href="<?= base_url('relawan/pelatihan/event') ?>" class=" btn btn-secondary">Kembali</a>
    </div>
</div>

<!-- Begin Modal -->
<div class="modal fade" id="modalDaftar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="POST" id="thisForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDaftarTitle">Upload Persyaratan Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="file_persyaratan" class="form-label">Pilih File <span class="text-danger">*</span></label>
                            <input type="file" id="file_persyaratan" class="form-control">
                            <div class="form-text">Lihat Persyaratan Pendaftaran di dalam file Informasi (detail Event, File tidak boleh lebih dari 2 MB)</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary" onclick="submitFilePendaftaran(<?= $_SESSION['id'] . ',' . @$event->id ?>)">Simpan dan Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
    function submitFilePendaftaran(id_relawan, id_event) {
        // console.log(id_relawan);
        // console.log(id_event);
        Loading.fire({})
        $.ajax({
            url: '<?= base_url('relawan/pelatihan/event_peserta/save') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id_relawan: id_relawan,
                id_event: id_event,
                dat: $('#thisForm').serialize()
            },
            success: function(json) {
                // dataTable.ajax.reload(function() {
                //     Swal.close();
                //     Toast.fire({
                //         icon: json.status,
                //         title: json.message
                //     });
                // });
                // },
                // error: function(xhr, status, error) {
                //     console.error('Error:', status, error);
                //     dataTable.ajax.reload();
            }
        });
    }
</script>