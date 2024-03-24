<div class="row mb-4">
    <div class="col-md-7 mb-3">
        <div class="card p-3">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <table id="datatables_table_event_unit" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Unit</th>
                            <th>Status Pendaftaran</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <!-- <tbody class="table-border-bottom-0">
                        <?php foreach ($event_unit as $index => $item) : ?>
                            <tr data-id_event_unit="<?= $item->id ?>">
                                <td><?= $index + 1 ?></td>
                                <td><?= $item->unit_nama ?></td>
                                <td><?= ($item->is_approve == 1 ? '<span class="badge bg-label-success">Disetujui</span>' : '<span class="badge bg-label-warning">Diperiksa</span>') ?></td>
                                <td><?= date('d M Y', strtotime($item->created_on)) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody> -->
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
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
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('admin/event/event') ?>" class=" btn btn-secondary">Kembali</a>
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
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#data_unit" aria-controls="data_unit" aria-selected="fasle">
                DATA PENDAFTARAN UNIT
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="peserta" role="tabpanel">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto">Peserta <?= @$event->nama ?></h5>
                <!-- <a href="#" class="btn btn-sm btn-success my-auto disabled" id="add_btn">Tambah data</a> -->
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <table id="datatables_table1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Status Pendaftaran</th>
                            <th>Nama</th>
                            <th>File Persyaratan</th>
                            <th>Foto</th>
                            <th>Catatan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="data_unit" role="tabpanel">
            <div class="table-responsive text-nowrap mt-2">
                <table id="table" class="table table-hover">
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td width="20%">Nama Unit</td>
                            <td width="2%">:</td>
                            <td width="70%" id="unit_nama"></td>
                        </tr>
                        <tr>
                            <td>Status Pendaftaran</td>
                            <td>:</td>
                            <td id="is_approve"></td>
                        </tr>
                        <tr>
                            <td>Kordinator</td>
                            <td>:</td>
                            <td id="kordinator_nama"></td>
                        </tr>
                        <tr>
                            <td>kontak</td>
                            <td>:</td>
                            <td id="kontak"></td>
                        </tr>
                        <tr>
                            <td>Jenis Unit</td>
                            <td>:</td>
                            <td id="unit_jenis"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pendaftaran</td>
                            <td>:</td>
                            <td id="created_on"></td>
                        </tr>
                        <tr>
                            <td>File Surat Tugas</td>
                            <td>:</td>
                            <td id="file_surat_tugas"></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>:</td>
                            <td>
                                <div class="input-group input-group-merge mb-2">
                                    <input type="text" name="keterangan" id="event_unit_keterangan" value="" class="form-control">
                                </div>
                                <input type="hidden" id="id_event_unit" value="" class="form-control">
                                <button type="submit" id="btn_save_catatan" onclick="update_catatan_unit()" class="btn btn-sm btn-primary disabled">Simpan Catatan</button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="catatanModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="catatanModalTitle">Form Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <form action=""> -->
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="id_event_peserta" name="id_event_peserta" value="">
                    <div class="mb-3">
                        <label for="event_peserta_keterangan" class="form-label">Catatan</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="event_peserta_keterangan" id="event_peserta_keterangan" value="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" onclick="update_catatan_peserta()" class="btn btn-primary">Save changes</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        dataTable = $('#datatables_table1').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'is_approve',
                    render: function(data, type, row) {
                        var id = row.id;
                        var bg = '';
                        var is_approve = '';

                        if (data == 1) {
                            bg = 'success';
                            is_approve = 'Disetujui';
                        } else if (data == 0) {
                            bg = 'warning';
                            is_approve = 'Diperiksa';
                        } else {
                            bg = 'danger';
                            is_approve = 'Ditolak';
                        }

                        if (data != '') {
                            return `<div class='btn-group'>
                                        <button type='button' class='btn btn-sm btn-` + bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                            ` + is_approve + `
                                        </button>
                                        <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status_event_peserta(` + id + `,1)'>Disetujui</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status_event_peserta(` + id + `,0)'>Diperiksa</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status_event_peserta(` + id + `,2)'>Ditolak</a></li>
                                        </ul>
                                    </div>`;
                        } else {
                            return '';
                        }
                    }
                },
                {
                    data: 'relawan_nama'
                },
                {
                    data: 'file_persyaratan',
                    render: function(data, type, row) {
                        return '<a href="<?= base_url('uploads/file/event/peserta/') ?>' + data + '" target="_blank" class="text-black"><span class="text-info">' + data + '</span></a>'
                    }
                },
                {
                    data: 'foto',
                    render: function(data, type, row) {
                        return `
                                <a href="<?= base_url('uploads/img/event/peserta/') ?>` + data + `" target="_blank">
                                    <img src="<?= base_url('uploads/img/event/peserta/') ?>` + data + `" height="100px" alt="">
                                </a>
                            `
                    }
                },
                {
                    data: 'keterangan'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return '<a href="#" onClick="edit_catatan_peserta(' + data + ')" class="text-info"><i class="bx bx-edit-alt me-1"></i></a>';
                    }
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });

        datatables_table_event_unit = $('#datatables_table_event_unit').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/event/event/getUnitArray?id_event=' . @$event->id) ?>',
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'unit_nama'
                },
                {
                    data: 'is_approve',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return '<span class="badge bg-label-success">Disetujui</span>';
                        } else if (data == 2) {
                            return '<span class="badge bg-label-danger">Ditolak</span>';
                        } else {
                            return '<span class="badge bg-label-warning">Diperiksa</span>';
                        }
                    }
                },
                {
                    data: 'created_on'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            rowCallback: function(row, data) {
                $(row).attr('data-id_event_unit', data.id);
            }
        });

        $('#datatables_table_event_unit').on('click', 'tbody tr', function(event) {
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
                    var is_approve = '';

                    if (json.data.is_approve == 1) {
                        bg = 'success';
                        is_approve = 'Disetujui';
                    } else if (json.data.is_approve == 0) {
                        bg = 'warning';
                        is_approve = 'Diperiksa';
                    } else {
                        bg = 'danger';
                        is_approve = 'Ditolak';
                    }

                    $('#unit_nama').html(json.data.unit_nama);
                    $('#is_approve').html(
                        `<div class='btn-group'>
                            <button type='button' class='btn btn-sm btn-` + bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                ` + is_approve + `
                            </button>
                            <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status_event_unit(` + id + `,1)'>Disetujui</a></li>
                                <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status_event_unit(` + id + `,0)'>Diperiksa</a></li>
                                <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status_event_unit(` + id + `,2)'>Ditolak</a></li>
                            </ul>
                        </div>`
                    );
                    $('#kordinator_nama').html(json.data.kordinator_nama);
                    $('#kontak').html(json.data.kontak);
                    $('#unit_jenis').html(json.data.unit_jenis + ' ' + json.data.unit_kategori);
                    $('#created_on').html(json.data.created_on);
                    $('#event_unit_keterangan_unit').val(json.data.keterangan);
                    $('#file_surat_tugas').html(`<a href="<?= base_url('uploads/file/event/admin/') ?>${json.data.file_surat_tugas}" target="_blank" class="text-black"><span class="text-info">${json.data.file_surat_tugas}</span></a>`);
                    $('#id_event_unit').val(id);

                    // catatan
                    $('#btn_save_catatan').removeClass('disabled');
                    let url = "<?= base_url('admin/event/event/save_catatan/') ?>";
                    $('#catata_form').attr('action', url + id);
                }
            }
        });

        // ambil data peserta
        dataTable.ajax.url('<?= base_url('admin/event/event/getPeserta?id_event_unit=') ?>' + id_event_unit).load(function() {
            Swal.close()
        });
        return false;
    }

    function update_status_event_peserta(id, is_approve) {
        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/event/event/update_status_event_peserta') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                is_approve: is_approve
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

    function update_status_event_unit(id, is_approve) {
        // Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/event/event/update_status_event_unit') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                is_approve: is_approve
            },
            success: function(json) {
                // Swal.close();
                Toast.fire({
                    icon: json.status,
                    title: json.message
                });
                ambil_data(id);
                datatables_table_event_unit.ajax.reload(null, false);
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                dataTable.ajax.reload();
            }
        });
    }

    function update_catatan_unit() {
        let event_unit_keterangan = $('#event_unit_keterangan').val();
        let id_event_unit = $('#id_event_unit').val();

        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/event/event/update_catatan_unit') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                event_unit_keterangan: event_unit_keterangan,
                id_event_unit: id_event_unit
            },
            success: function(json) {
                Swal.close();
                Toast.fire({
                    icon: json.status,
                    title: json.message
                });

                event_unit_keterangan = '';
                id_event_unit = '';
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
        });
    }

    function edit_catatan_peserta(id_event_peserta) {
        $("#catatanModal").modal('show');
        $("#id_event_peserta").val(id_event_peserta);
    }

    function update_catatan_peserta() {
        let id_event_peserta = $('#id_event_peserta').val();
        let event_peserta_keterangan = $('#event_peserta_keterangan').val();

        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/event/event/update_catatan_peserta') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id_event_peserta: id_event_peserta,
                event_peserta_keterangan: event_peserta_keterangan
            },
            success: function(json) {
                dataTable.ajax.reload(function() {
                    Swal.close();
                    Toast.fire({
                        icon: json.status,
                        title: json.message
                    });
                });

                $("#catatanModal").modal('hide');

                event_peserta_keterangan = '';
                id_event_peserta = '';
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
        });

        // $("#modalForm")[0].reset();
    }
</script>