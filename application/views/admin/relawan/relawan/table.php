<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#PMR-MULA" aria-controls="PMR-MULA" aria-selected="fasle">
                PMR MULA
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#PMR-MADYA" aria-controls="PMR-MADYA" aria-selected="false">
                PMR MADYA
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#PMR-WIRA" aria-controls="PMR-WIRA" aria-selected="false">
                PMR WIRA
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#KSR" aria-controls="KSR" aria-selected="false">
                KSR
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#TSR" aria-controls="TSR" aria-selected="false">
                TSR
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="tab" role="tabpanel">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
                <a href="#" class="btn btn-sm btn-success my-auto disabled" id="add_btn">Tambah data</a>
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
    var dataTable, url = '';

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
                    data: 'nomor_telepon'
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
                            return '<a class="text-info" href="<?= base_url() ?>admin/relawan/relawan?page=edit&id=' + data + '&unit=' + unit + '"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '<a class="text-danger" href="#" onclick="confirmDelete(\'<?= base_url('admin/relawan/relawan/nonaktif/') ?>' + data + '\')"><i class="bx bx-trash me-1"></i></a>';
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


        var queryString = window.location.search;

        var parameterName = 'unit';
        var urlParams = new URLSearchParams(queryString);
        var parameterValue = '#' + urlParams.get(parameterName);

        $('button.nav-link').each(function() {
            var targetValue = $(this).data('bs-target');
            if (targetValue == parameterValue) {
                $(this).attr('aria-selected', 'true');
                $(this).addClass('active');
            } else {
                $(this).attr('aria-selected', 'false');
                $(this).removeClass('active');
            }
        });

        ambil_data(parameterValue);


        $('button.nav-link').on('click', function() {
            ambil_data($(this).data('bs-target'));

        });

    });

    function ambil_data(tabId) {
        Loading.fire({})
        dataTable.ajax.url('<?= base_url('admin/relawan/relawan/get/') ?>' + tabId.substring(1)).load(function() {
            Swal.close()
        });

        $('#add_btn').removeClass('disabled');
        $('#add_btn').attr('href', '<?= base_url('admin/relawan/relawan?page=add&unit=') ?>' + tabId.substring(1));


        history.replaceState(null, null, '?unit=' + tabId.substring(1));

        return false;
    }

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