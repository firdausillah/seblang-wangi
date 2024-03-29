<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap mt-2">
                    <table id="table" class="table table-hover">
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>Nama Unit</td>
                                <td>:</td>
                                <td><?= @$unit->nama ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Unit</td>
                                <td>:</td>
                                <td><?= @$unit->jenis ?></td>
                            </tr>
                            <tr>
                                <td>Kategori Unit</td>
                                <td>:</td>
                                <td><?= @$unit->kategori ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= @$unit->alamat ?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td><?= @$unit->telepon ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= @$unit->email ?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><?= @$unit->password ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= (@$unit->is_active == 1 ? '<span class="btn btn-sm btn-success">Aktif</span>' : (@$unit->is_active == 0 ? '<span class="btn btn-sm btn-danger">Nonaktif</span>' : '<span class="btn btn-sm btn-warning">Register</span>')) ?></td>
                            </tr>
                            <tr>
                                <td>Surat Keterangan</td>
                                <td>:</td>
                                <td><a href="<?= base_url('uploads/file/unit/' . @$unit->sk) ?>" target="_blank" class="text-black"><span class="text-info"><?= @$unit->sk ?></span></a></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><?= @$unit->keterangan ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('admin/relawan/unit') ?>" class=" btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kordinator Unit</h5>
                <a href="<?= base_url('admin/relawan/unit?page=add_kordinator&id_unit=' . ($_GET['id'] ? $_GET['id'] : '')) ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap mt-2">
                    <table id="datatables_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Unit</th>
                                <th>Tahun Mulai</th>
                                <th>Tahun Selesai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($unit_kordinator as $index => $item) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $item->nama ?></td>
                                    <td><?= $item->tahun_mulai ?></td>
                                    <td><?= $item->tahun_selesai ?></td>
                                    <td>
                                        <a class="text-info" href="<?= base_url('admin/relawan/unit?page=edit_kordinator&id=' . $item->id . '&id_unit=' . ($_GET['id'] ? $_GET['id'] : '')) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                                        <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/relawan/unit/nonaktif_kordinator/' . $item->id . '&id_unit=' . ($_GET['id'] ? $_GET['id'] : '')) ?>')"><i class="bx bx-trash me-1"></i></a>
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
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto">Anggota Unit <?= @$unit->nama ?></h5>
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
                            <th>Email</th>
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
                    data: 'is_approve',
                    render: function(data, type, row) {
                        var id = row.id;
                        var bg = '';
                        var is_approve = '';

                        if (data == 1) {
                            bg = 'success';
                            is_approve = 'Aktif';
                        } else if (data == 2) {
                            bg = 'danger';
                            is_approve = 'Ditolak';
                        } else {
                            bg = 'warning';
                            is_approve = 'Diperiksa';
                        }

                        if (data != '') {
                            return `<div class='btn-group'>
                                        <button type='button' class='btn btn-sm btn-` + bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                            ` + is_approve + `
                                        </button>
                                        <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,1)'>Aktif</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,0)'>Diperiksa</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,2)'>Ditolak</a></li>
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
                    data: 'email'
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
                        // var unit = row.unit_jenis + kategori;
                        var unit = row.id_unit;
                        if (data != '') {
                            return '<span>' +
                                '<a class="text-info" href="<?= base_url() ?>admin/relawan/unit?page=edit_relawan&id=' + data + '&unit=' + unit + '">' +
                                '<i class="bx bx-edit-alt me-1"></i>' +
                                '</a>' +
                                '<a class="text-danger" href="#" onclick="confirmDelete(\'<?= base_url('admin/relawan/unit/nonaktif/') ?>' + data + '\)">' +
                                '<i class="bx bx-trash me-1"></i>' +
                                '</a>' +
                                '</span>';
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

    function update_status(id, is_approve) {
        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/relawan/relawan/update_status') ?>',
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
</script>