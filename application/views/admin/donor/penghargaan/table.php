<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/donor/penghargaan?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Penghargaan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($penghargaan as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->jenis_kelamin ?></td>
                        <td><?= $item->tempat_lahir ?></td>
                        <td><?= ($item->tanggal_lahir == '0000-00-00' ? '' : date('d-M-Y', strtotime($item->tanggal_lahir))) ?></td>
                        <td><?= $item->alamat ?></td>
                        <td><?= $item->penghargaan ?></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="relative">
                                    <a class="dropdown-item" href="<?= base_url('admin/donor/penghargaan?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" onclick="confirmDelete('<?= base_url('admin/donor/penghargaan/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>