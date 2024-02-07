<div class="row">
    <div class="col-lg-6">
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
                    <a href="<?= base_url('unit/relawan/unit?page=edit') ?>" class=" btn btn-info">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kordinator Unit</h5>
                <a href="<?= base_url('unit/relawan/unit?page=add_kordinator') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
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
                                <th>Status</th>
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
                                    <td><?= ($item->tahun_selesai > date('Y')? '<span class="btn btn-sm btn-success">Aktif</span>': '<span class="btn btn-sm btn-danger">Nonaktif</span>') ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" style="relative">
                                                <a class="dropdown-item" href="<?= base_url('unit/relawan/unit?page=edit_kordinator&id=' . $item->id ) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" onclick="confirmDelete('<?= base_url('unit/relawan/unit/nonaktif_kordinator/' . $item->id ) ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
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