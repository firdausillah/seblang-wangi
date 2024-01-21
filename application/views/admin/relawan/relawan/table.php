<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#PMR-MULA" aria-controls="PMR-MULA" aria-selected="true">
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
    var dataTable = '';
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
                            is_active = 'Calon Anggota';
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
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='update_status(` + id + `,2)'>Calon Anggota</a></li>
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
                    render: function(data) {
                        if (data != '') {
                            return '<div class="dropdown">' +
                                '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">' +
                                '<i class="bx bx-dots-vertical-rounded"></i>' +
                                '</button>' +
                                '<div class="dropdown-menu" style="relative">' +
                                '<a class="dropdown-item" href="<?= base_url('admin/relawan/relawan?page=edit&id=') ?>' + data + '"><i class="bx bx-edit-alt me-1"></i> Edit</a>' +
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
        // Tangkap peristiwa klik pada tombol tab
        $('.nav-link').on('click', function() {

                // Dapatkan ID tab yang terkait dengan tombol yang diklik
                var tabId = $(this).data('bs-target');

                // Mengambil data dari server menggunakan metode ajax DataTables
                dataTable.ajax.url('<?= base_url('admin/relawan/relawan/get/') ?>' + tabId.substring(1)).load();

                $('#add_btn').removeClass('disabled');
                $('#add_btn').attr('href', '<?= base_url('admin/relawan/relawan?page=add&relawan=') ?>' + tabId.substring(1));
        });

    });

    function update_status(id, is_active) {
        $.ajax({
            url: '<?= base_url('admin/relawan/relawan/update_status') ?>',
            type: 'POST', // atau 'POST', 'PUT', dll.
            dataType: 'json', // tipe data yang diharapkan dari respons server
            data: {
                id: id,
                is_active: is_active
                // data lain yang ingin Anda kirim ke server
            },
            success: function(json) {
                // notify(json.message, json.status);
                dataTable.ajax.reload();
                Swal.fire({
                    position: "top-end",
                    icon: json.status,
                    title: json.status,
                    text: json.message,
                    showConfirmButton: false,
                    timer: 1000
                });
            },
            error: function(xhr, status, error) {
                // Fungsi ini akan dipanggil jika permintaan gagal
                console.error('Error:', status, error);
                dataTable.ajax.reload();
            }
        });
    }
</script>