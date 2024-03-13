<div class="row mb-4">
    <div class="col-md-7 mb-3">
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
                    <a href="<?= base_url('admin/event/event') ?>" class=" btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card p-3">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <table id="datatables_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Unit</th>
                            <th>Status Pendaftaran</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($unit_peserta as $index => $item) : ?>
                            <tr data-id_event_unit="<?= $item->id ?>">
                                <td><?= $index + 1 ?></td>
                                <td><?= $item->unit_nama ?></td>
                                <td><?= ($item->is_approve == 1 ? '<span class="badge bg-label-success">Disetujui</span>' : '<span class="badge bg-label-warning">Diperiksa</span>') ?></td>
                                <td><?= date('d M Y', strtotime($item->created_on)) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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
                            <th>Status</th>
                            <th>Nama</th>
                            <th>Nama Unit</th>
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
                            <td>Keterangan</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                    data: 'is_active',
                    render: function(data, type, row) {
                        var id = row.id;
                        var bg = '';
                        var is_active = '';

                        if (data == 1) {
                            bg = 'success';
                            is_active = 'Aktif';
                        } else if (data == 2) {
                            bg = 'warning';
                            is_active = 'Registrasi';
                        } else {
                            bg = 'danger';
                            is_active = 'Nonaktif';
                        }

                        if (data != '') {
                            return `<div class='btn-group'>
                                        <button type='button' class='btn btn-sm btn-` + bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                            ` + is_active + `
                                        </button>
                                        <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,1)'>Aktif</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,0)'>Nonaktif</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,2)'>Registrasi</a></li>
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
                    data: 'unit_nama'
                },
                {
                    data: 'unit_nama'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });

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