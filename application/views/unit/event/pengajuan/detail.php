<div class="row">
    <div class="col-md-7">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart(base_url('unit/event/pengajuan/save_unit')) ?>
                <input type="hidden" name="id" value="<?= @$event_unit->id ?>">
                <input type="hidden" name="event_nama" value="<?= @$event_unit->event_nama ?>">
                <input type="hidden" name="unit_nama" value="<?= @$event_unit->unit_nama ?>">
                <div class="mb-3">
                    <div class="row">
                        <label class="form-label" for="">Status pendaftaran</label>
                    </div>
                    <div class="row">
                        <?= (@$event_unit->is_approve == 1 ? '<span class="alert alert-success">Disetujui</span>' : (@$event_unit->is_approve == 0 ? '<span class="alert alert-warning">Pendaftaran sedang diperiksa, silahkan hubungi Admin untuk informasi lebih lanjut</span>' : '<span class="alert alert-danger">Ditolak</span>')) ?>
                        <div class="">
                            <label class="form-label" for="keterangan">Catatan Admin</label>
                            <!-- <input type="text" class="form-control" id="keterangan" value="<?= @$event_unit->keterangan ?>" readonly> -->
                            <br>
                            <span class="text-warning"><?= @$event_unit->keterangan ?></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="">Tanggal Daftar <span class="text-danger">*</span></label>
                    <input type="input" class="form-control" value="<?= date('d M Y', strtotime(@$event_unit->created_on)) ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="kordinator_nama">Nama Kordinator <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kordinator_nama" id="kordinator_nama" value="<?= @$event_unit->kordinator_nama ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="kontak">kontak <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="kontak" id="kontak" value="<?= @$event_unit->kontak ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="file">File Surat Tugas</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control file" type="file" name="file">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$event_unit->file_surat_tugas ?>" name="file_name">
                </div>
                <div class="mb-3">
                    <a href="<?= base_url('uploads/file/event/unit/' . @$event_unit->file_surat_tugas) ?>" target="_blank" class="text-black">File Surat Tugas : <span class="text-info"><?= @$event_unit->file_surat_tugas ?></span></a>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
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
                                    <a href="<?= base_url('uploads/img/event/admin/' . @$event->foto) ?>" target="_blank"><span class="text-info"><?= @$event->foto ?></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>File Informasi</td>
                                <td>:</td>
                                <td>
                                    <a href="<?= base_url('uploads/file/event/admin/' . @$event->file_info) ?>" target="_blank" class="text-black"><span class="text-info"><?= @$event->file_info ?></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><?= @$event->keterangan ?></td>
                            </tr>
                            <tr>
                                <td>Print ID Card</td>
                                <td>:</td>
                                <td>
                                    <a href="<?= base_url('admin/event/cetak/id_card_event_unit/' . @$event_unit->id) ?>" target="_blank" class="btn btn-sm <?= @$event_unit->is_approve == 1 ? 'btn-success' : 'btn-secondary disabled' ?>">Peserta</a>
                                    <a href="<?= base_url('admin/event/cetak/id_card_event_unit_pendamping/' . @$event_unit->id) ?>" target="_blank" class="btn btn-sm <?= @$event_unit->is_approve == 1 ? 'btn-success' : 'btn-secondary disabled' ?>">Kordinator</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('unit/event/pengajuan') ?>" class=" btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#peserta" aria-controls="peserta" aria-selected="true">
                PESERTA
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#pendamping" aria-controls="pendamping" aria-selected="fasle">
                PENDAMPING
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="peserta" role="tabpanel">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto">Daftar Peserta Event</h5>
                <!-- <a href="#" onclick="addButton()" class="btn btn-sm btn-success my-auto">Tambah data</a> -->
                <button type="button" class="btn btn-sm btn-success my-auto" data-bs-toggle="modal" data-bs-target="#modalFormPeserta" data-bs-id="">
                    Tambah data
                </button>
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <div class="table-responsive text-nowrap mt-2">
                    <table id="datatables_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status Pendaftaran</th>
                                <th>Nama</th>
                                <th>File Persyaratan</th>
                                <th>Foto</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($event_peserta as $index => $item) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= ($item->is_approve == 1 ? '<span class="badge bg-label-success">Disetujui</span>' : ($item->is_approve == 0 ? '<span class="badge bg-label-warning">Diperiksa</span>' : '<span class="badge bg-label-danger">Ditolak</span>')) ?></td>
                                    <td><?= $item->relawan_nama ?></td>
                                    <td>
                                        <a href="<?= base_url('uploads/file/event/peserta/' . $item->file_persyaratan) ?>" target="_blank" class="text-black"><span class="text-info"><?= $item->file_persyaratan ?></span></a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('uploads/img/event/peserta/' . $item->foto) ?>" target="_blank">
                                            <img src="<?= base_url('uploads/img/event/peserta/' . $item->foto) ?>" height="100px" alt="">
                                        </a>
                                    </td>
                                    <td><?= $item->keterangan ?></td>
                                    <td>
                                        <?php if (@$event_unit->is_approve == 1 && $item->is_approve == 1) : ?>
                                            <a href="<?= base_url('admin/event/cetak/id_card_event_peserta/' . $item->id) ?>" target="_blank" class="text-success"><i class='bx bxs-download me-2'></i></a>
                                        <?php else : ?>
                                            <span class="text-secondary"><i class='bx bxs-download me-2'></i></span>
                                        <?php endif ?>
                                        <button type="button" class="btn btn-sm text-info my-auto" id="edit_peserta" data-bs-toggle="modal" data-bs-target="#modalFormPeserta" data-bs-id="<?= $item->id ?>">
                                            <i class="bx bx-edit-alt me-1"></i>
                                        </button>
                                        <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('unit/event/pengajuan/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pendamping" role="tabpanel">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto">Daftar Pendamping Event</h5>
                <!-- <a href="#" onclick="addButton()" class="btn btn-sm btn-success my-auto">Tambah data</a> -->
                <a href="<?= base_url('unit/event/pengajuan?page=add_pendamping&id_event_unit='. @$event_unit->id) ?>" class="btn btn-sm btn-success my-auto">
                    Tambah data
                </a>
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <div class="table-responsive text-nowrap mt-2">
                    <table id="datatables_table2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status Pendaftaran</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($event_pendamping as $index => $item) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= ($item->is_approve == 1 ? '<span class="badge bg-label-success">Disetujui</span>' : ($item->is_approve == 0 ? '<span class="badge bg-label-warning">Diperiksa</span>' : '<span class="badge bg-label-danger">Ditolak</span>')) ?></td>
                                    <td><?= $item->nama ?></td>
                                    <td>
                                        <a href="<?= base_url('uploads/img/event/pendamping/' . $item->foto) ?>" target="_blank">
                                            <img src="<?= base_url('uploads/img/event/pendamping/' . $item->foto) ?>" height="100px" alt="">
                                        </a>
                                    </td>
                                    <td><?= $item->keterangan ?></td>
                                    <td>
                                        <?php if (@$event_unit->is_approve == 1 && $item->is_approve == 1) : ?>
                                            <a href="<?= base_url('admin/event/cetak/id_card_event_pendamping/' . $item->id) ?>" target="_blank" class="text-success"><i class='bx bxs-download me-2'></i></a>
                                        <?php else : ?>
                                            <span class="text-secondary"><i class='bx bxs-download me-2'></i></span>
                                        <?php endif ?>
                                        <a href="<?= base_url('unit/event/pengajuan?page=edit_pendamping&id_event_unit=' . @$event_unit->id. '&id_event_pendamping='.$item->id) ?>" class="btn btn-sm text-info my-auto">
                                            <i class="bx bx-edit-alt me-1"></i>
                                        </a>
                                        <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('unit/event/pengajuan/nonaktif_pendamping/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalFormPeserta" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormPesertaTitle">Form Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart(base_url('unit/event/pengajuan/save_peserta'), 'id="_modalFormPeserta"') ?>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="id_event_unit" value="<?= @$event_unit->id ?>">
                    <div class="mb-3">
                        <label for="id_relawan" class="form-label">Nama Relawan</label>
                        <div class="input-group input-group-merge">
                            <select class="js-example-basic form-select" id="id_relawan" name="id_relawan">
                                <option>--Pilih--</option>
                                <?php foreach ($relawan as $key => $value) : ?>
                                    <option <?= $value->id == @$event_peserta->id_relawan ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->nama . ' - (' . $value->kode . ')' ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="foto">Foto</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control foto" type="file" name="foto">
                        </div>
                        <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                        <input type="hidden" class="form-control" value="" id="gambar" name="gambar">
                        <small class="text-primary">gunakan foto dengan background merah</small>
                    </div>
                    <div class="mb-3">
                        <img src="#" id="img_placeholder" height="200px" alt="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="file">File Persyaratan</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control file" type="file" name="file">
                        </div>
                        <input type="hidden" class="form-control" value="" id="file_name" name="file_name">
                    </div>
                    <div class="mb-3">
                        <a href="#" id="file_placeholder" target="_blank" class="text-black">File Persyaratan : <span class="text-info" id="file_name_holder"></span></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal Pendamping-->
<!-- <div class="modal fade" id="modalFormPendamping" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormPendampingTitle">Form Pendamping</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart(base_url('unit/event/pengajuan/save_pendamping'), 'id="_modalFormPendamping"') ?>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id_pendamping" id="id_pendamping" value="">
                    <input type="hidden" name="id_event_unit" value="<?= @$event_unit->id ?>">
                    <input type="hidden" name="id_unit" value="<?= @$event_unit->id_unit ?>">
                    <div class="mb-3">
                        <label for="pendamping_nama" class="form-label">Nama Pendamping</label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" name="pendamping_nama" id="pendamping_nama">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="foto">Foto</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control foto" type="file" name="foto">
                        </div>
                        <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                        <input type="hidden" class="form-control" value="" id="gambar" name="gambar">
                        <small class="text-primary">gunakan foto dengan background merah</small>
                    </div>
                    <div class="mb-3">
                        <img src="#" id="img_placeholder" height="200px" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div> -->


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#datatables_table2').DataTable({
            responsive: true
        });

        $('#edit_peserta').on('click', function(event) {
            let id_peserta = $(this).attr('data-bs-id');
            edit_peserta(id_peserta);
        });

        $('#modalFormPeserta').on('hidden.bs.modal', function() {
            $("#_modalFormPeserta")[0].reset();
            $("#id").val('');
            $("#id_relawan").val('');
            $('#img_placeholder').attr('src', '');
            $('#file_placeholder').html('');
            $('#file_placeholder').attr('href', '');
        })

        // $('#modalFormPendamping').on('hidden.bs.modal', function() {
        //     $("#_modalFormPendamping")[0].reset();
        //     $("#id_pendamping").val('');
        //     $('#img_placeholder').attr('src', '');
        // })

    });

    function edit_peserta(id_peserta) {
        var file_base_url = '<?= base_url('uploads/file/event/peserta/') ?>';
        var img_base_url = '<?= base_url('uploads/img/event/peserta/') ?>';
        Loading.fire({})

        // ambil data unit
        $.ajax({
            url: '<?= base_url('unit/event/pengajuan/getUnitPeserta?id_peserta=') ?>' + id_peserta,
            type: 'POST',
            dataType: 'json',
            success: function(json) {
                Swal.close();
                if (json != undefined) {
                    $('#id').val(json.data.id);
                    $('#id_relawan').val(json.data.id_relawan);
                    $('#gambar').val(json.data.foto);
                    $('#img_placeholder').attr('src', img_base_url + json.data.foto);
                    $('#file_name').val(json.data.file_persyaratan);
                    $('#file_name_holder').html(json.data.file_persyaratan);
                    $('#file_placeholder').attr('href', file_base_url + json.data.file_persyaratan);
                }
            }
        });
        return false;
    }

    // function edit_pendamping(id_pendamping) {
    //     // console.log(id_pendamping);
    //     var img_base_url = '<?= base_url('uploads/img/event/pendamping/') ?>';
    //     Loading.fire({})

    //     // ambil data unit
    //     $.ajax({
    //         url: '<?= base_url('unit/event/pengajuan/getUnitPendamping?id_pendamping=') ?>' + id_pendamping,
    //         type: 'POST',
    //         dataType: 'json',
    //         success: function(json) {
    //             Swal.close();
    //             if (json != undefined) {
    //                 $('#id_pendamping').val(json.data.id);
    //                 $('#pendamping_nama').val(json.data.nama);
    //                 $('#gambar').val(json.data.foto);
    //                 $('#img_placeholder').attr('src', img_base_url + json.data.foto);
    //             }
    //         }
    //     });
    //     return false;
    // }
</script>