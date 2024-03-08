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
            <a href="<?= base_url('admin/event/event') ?>" class=" btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#AKTIF" aria-controls="AKTIF" aria-selected="true">
                AKTIF
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#REGISTER" aria-controls="REGISTER" aria-selected="fasle">
                REGISTER
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#NONAKTIF" aria-controls="NONAKTIF" aria-selected="fasle">
                NONAKTIF
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="tab" role="tabpanel">
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

        ambil_data('#AKTIF');

        $('button.nav-link').on('click', function() {
            ambil_data($(this).data('bs-target'));
        });

    });

    function ambil_data(tabId) {
        Loading.fire({})
        dataTable.ajax.url('<?= base_url('admin/event/event/getById?id=' . $event->id) . '&is_active=' ?>' + tabId.substring(1)).load(function() {
            Swal.close()
        });

        // $('#add_btn').removeClass('disabled');
        // $('#add_btn').attr('href', '<?= base_url('admin/event/event?page=add&is_active=') ?>' + tabId.substring(1));


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