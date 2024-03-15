<div class="row">
    <div class="col-md-7">
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
                                    <a href="<?= base_url('uploads/img/event/admin/' . @$event->foto) ?>" target="_blank"><img src="<?= base_url('uploads/img/event/admin/' . @$event->foto) ?>" height="200px" alt=""></a>
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
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('unit/event/pengajuan') ?>" class=" btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart(base_url('unit/event/event/save')) ?>
                <input type="hidden" name="id" value="<?= @$event_unit->id ?>">
                <div class="mb-3">
                    <div class="row">
                        <label class="form-label" for="">Status pendaftaran</label>
                    </div>
                    <div class="row">
                        <?= ($event_unit->is_approve == 1 ? '<span class="alert alert-success">Disetujui</span>' : '<span class="alert alert-warning">Pendaftaran sedang diperiksa, silahkan hubungi Admin untuk informasi lebih lanjut</span>') ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="">Tanggal Daftar <span class="text-danger">*</span></label>
                    <input type="input" class="form-control" value="<?= date('d M Y', strtotime($event_unit->created_on)) ?>" disabled>
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
                    <label class="form-label" for="file_surat_tugas">File Informasi</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control file_surat_tugas" type="file" name="file_surat_tugas">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$event_unit->file_surat_tugas ?>" name="file_surat_tugas_name">
                </div>
                <div class="mb-3">
                    <a href="<?= base_url('uploads/file/event/unit/' . @$event_unit->file_surat_tugas) ?>" target="_blank" class="text-black">File Informasi : <span class="text-info"><?= @$event_unit->file_surat_tugas ?></span></a>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto">Daftar Peserta Event</h5>
        <!-- <a href="#" onclick="addButton()" class="btn btn-sm btn-success my-auto">Tambah data</a> -->
        <button type="button" class="btn btn-sm btn-success my-auto" data-bs-toggle="modal" data-bs-target="#modalCenter" data-bs-id="">
            Tambah data
        </button>
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <div class="table-responsive text-nowrap mt-2">
            <table id="datatables_table1" class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Status Pendaftaran</th>
                        <th>Nama</th>
                        <th>File Persyaratan</th>
                        <th>Foto</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php foreach ($event_peserta as $index => $item) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= ($item->is_approve == 1 ? '<span class="badge bg-label-success">Disetujui</span>' : '<span class="badge bg-label-warning">Diperiksa</span>') ?></td>
                            <td><?= $item->relawan_nama ?></td>
                            <td>
                                <a href="<?= base_url('uploads/file/event/peserta/' . $item->file_persyaratan) ?>" target="_blank" class="text-black"><span class="text-info"><?= $item->file_persyaratan ?></span></a>
                            </td>
                            <td>
                                <a href="<?= base_url('uploads/img/event/peserta/' . $item->foto) ?>" target="_blank">
                                    <img src="<?= base_url('uploads/img/event/peserta/' . $item->foto) ?>" height="200px" alt="">
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm text-info my-auto" data-bs-toggle="modal" data-bs-target="#modalCenter" data-bs-id="<?= $item->id ?>">
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

<!-- modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Name</label>
                        <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailWithTitle" class="form-label">Email</label>
                        <input type="text" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                        <label for="dobWithTitle" class="form-label">DOB</label>
                        <input type="text" id="dobWithTitle" class="form-control" placeholder="DD / MM / YY">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {


        $('#datatables_table').on('click', 'tbody tr', function(event) {
            $(this).addClass('table-active').siblings().removeClass('table-active');
            // console.log();
            let id_event_unit = $(this).attr('data-id_event_unit');
            ambil_data(id_event_unit);
        });

    });

    function ambil_data(id_event_unit) {
        Loading.fire({})
        // ambil data unit
        $.ajax({
            url: '<?= base_url('admin/event/event/getUnit?id_event_unit=') ?>' + id_event_unit,
            type: 'POST',
            dataType: 'json',
            success: function(json) {
                if (json != undefined) {

                    var id = json.data.id;
                    var bg = '';
                    var is_active = '';

                    if (json.data.is_approve == 1) {
                        bg = 'success';
                        is_active = 'Disetujui';
                    } else if (json.data.is_approve == 0) {
                        bg = 'warning';
                        is_active = 'Diperiksa';
                    } else {
                        bg = 'danger';
                        is_active = 'Nonaktif';
                    }

                    $('#unit_nama').html(json.data.unit_nama);
                    $('#is_approve').html(
                        `<div class='btn-group'>
                            <button type='button' class='btn btn-sm btn-` + bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                ` + is_active + `
                            </button>
                            <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,1)'>Aktif</a></li>
                                <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,0)'>Nonaktif</a></li>
                                <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,2)'>Registrasi</a></li>
                            </ul>
                        </div>`
                    );
                    $('#kordinator_nama').html(json.data.kordinator_nama);
                    $('#kontak').html(json.data.kontak);
                    $('#unit_jenis').html(json.data.unit_jenis + ' ' + json.data.unit_kategori);
                    $('#created_on').html(json.data.created_on);
                    $('#file_surat_tugas').html(`<a href="<?= base_url('uploads/file/event/admin/') ?>${json.data.file_surat_tugas}" target="_blank" class="text-black"><span class="text-info">${json.data.file_surat_tugas}</span></a>`);
                }
            }
        });

        // ambil data peserta
        dataTable.ajax.url('<?= base_url('admin/event/event/getPeserta?id_event_unit=') ?>' + id_event_unit).load(function() {
            Swal.close()
        });
        return false;
    }

    function update_status(id, is_active) {
        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/event/event/update_status') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                is_active: is_active
            },
            success: function(json) {
                dataTable.ajax.reload(function() {
                    Swal.close();
                    Toast.fire({
                        icon: json.status,
                        title: json.message
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                dataTable.ajax.reload();
            }
        });
    }
</script>