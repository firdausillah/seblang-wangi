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
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?= @$event->keterangan ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <a href="<?= base_url('admin/relawan/unit') ?>" class=" btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto">Peserta <?= @$event->nama ?></h5>
                <a href="<?= base_url('admin/relawan/unit?page=add_relawan&id_unit=' . ($_GET['id'] ? $_GET['id'] : '')) ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
                <!-- <a href="" class="btn btn-info">Tambah data</a> -->
            </div>
            <div class="table-responsive text-nowrap mt-2">
                <table id="datatables_table1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Status</th>
                            <th>Nama</th>
                            <th>Kode Anggota</th>
                            <th>Angkatan</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor Telepon</th>
                            <th>Nama Unit</th>
                            <th>Jenis Unit</th>
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
                    data: 'nama'
                },
                {
                    data: 'kode'
                },
                {
                    data: 'angkatan'
                },
                {
                    data: 'jenis_kelamin'
                },
                {
                    data: 'telepon'
                },
                {
                    data: 'unit_jenis'
                },
                {
                    data: 'unit_kategori'
                },
                {
                    data: "id",
                    render: function(data, type, row) {
                        var kategori = (row.unit_kategori ? ('-' + row.unit_kategori) : '');
                        var unit = row.unit_jenis + kategori;
                        if (data != '') {
                            return '<div class="dropdown">' +
                                '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">' +
                                '<i class="bx bx-dots-vertical-rounded"></i>' +
                                '</button>' +
                                '<div class="dropdown-menu" style="relative">' +
                                '<a class="dropdown-item" href="<?= base_url() ?>admin/relawan/relawan?page=edit&id=' + data + '&unit=' + unit + '"><i class="bx bx-edit-alt me-1"></i> Edit</a>' +
                                '<a class="dropdown-item" onclick="confirmDelete(\'<?= base_url('admin/relawan/relawan/nonaktif/') ?>' + data + '\')"><i class="bx bx-trash me-1"></i> Delete</a>' +
                                '</div>' +
                                '</div>';
                        } else {
                            return '';
                        }
                    }
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            order: [
                [4, 'asc']
            ]
        });

        // BEGIN Ambil query string dari URL
        var queryString = window.location.search;
        var urlParams = new URLSearchParams(queryString);
        var id = urlParams.get('id');
        // END Ambil query string dari URL

        Loading.fire({})
        dataTable.ajax.url('<?= base_url('admin/relawan/relawan/getById/') ?>' + id).load(function() {
            Swal.close()
        });

    });

    function update_status(id, is_active) {
        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/relawan/relawan/update_status') ?>',
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