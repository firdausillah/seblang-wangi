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
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kordinator Unit</h5>
                <a href="<?= base_url('admin/relawan/unit_kordinator?page=add&unit_id='.($_GET['id']?$_GET['id']:'')) ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
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
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" style="relative">
                                                <a class="dropdown-item" href="<?= base_url('admin/relawan/unit?page=detail&id=' . $item->id) ?>"><i class="bx bx-detail me-1"></i> Detail</a>
                                                <a class="dropdown-item" href="<?= base_url('admin/relawan/unit?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" onclick="confirmDelete('<?= base_url('admin/relawan/unit/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
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
    <div class="card p-3">
        <div class="d-flex justify-content-between">
            <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
            <a href="<?= base_url('admin/relawan/unit?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
            <!-- <a href="" class="btn btn-info">Tambah data</a> -->
        </div>
        <div class="table-responsive text-nowrap mt-2">
            <table id="datatables_table" class="table table-hover">
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
                <tbody class="table-border-bottom-0">
                    <?php foreach ($relawan as $index => $item) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $item->is_active ?></td>
                            <td><?= $item->nama ?></td>
                            <td><?= $item->kode ?></td>
                            <td><?= $item->angkatan ?></td>
                            <td><?= $item->jenis_kelamin ?></td>
                            <td><?= $item->nomor_telepon ?></td>
                            <td><?= $item->unit_jenis ?></td>
                            <td><?= $item->unit_kategori ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="relative">
                                        <a class="dropdown-item" href="<?= base_url('admin/relawan/unit?page=detail&id=' . $item->id) ?>"><i class="bx bx-detail me-1"></i> Detail</a>
                                        <a class="dropdown-item" href="<?= base_url('admin/relawan/unit?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" onclick="confirmDelete('<?= base_url('admin/relawan/unit/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>