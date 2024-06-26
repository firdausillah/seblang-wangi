<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <span>
            <a href="#" onclick="exportExcel('<?= base_url('admin/relawan/unit/') ?>')" class="btn btn-sm btn-info my-auto">Export Excel</a>
            <a href="<?= base_url('admin/relawan/unit?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        </span>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Unit</th>
                    <th>Email</th>
                    <th>No Telpon</th>
                    <th>Status</th>
                    <th>Jenis Unit</th>
                    <th>Kategori Unit</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($unit as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><a href="<?= base_url('admin/relawan/unit?page=detail&id=' . $item->id) ?>" class="text-black"><?= $item->nama ?></a></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->telepon ?></td>
                        <td><?= ($item->is_approve == 1 ? '<span class="btn btn-sm btn-success">Disetujui</span>' : ($item->is_approve == 0 ? '<span class="btn btn-sm btn-warning">Diperiksa</span>' : '<span class="btn btn-sm btn-danger">Ditolak</span>')) ?></td>
                        <td><?= $item->jenis ?></td>
                        <td><?= $item->kategori ?></td>
                        <td>
                            <a class="text-success" href="<?= base_url('admin/relawan/unit?page=detail&id=' . $item->id) ?>"><i class="bx bx-detail me-1"></i></a>
                            <a class="text-info" href="<?= base_url('admin/relawan/unit?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/relawan/unit/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>