<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <span>
            <a href="#" onclick="exportExcel('<?= base_url('admin/logistik/aset_kendaraan/') ?>')" class="btn btn-sm btn-info my-auto">Export Excel</a>
            <a href="<?= base_url('admin/logistik/aset_kendaraan?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        </span>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Merk</th>
                    <th>No. Plat</th>
                    <th>No. Rangka</th>
                    <th>No. Mesin</th>
                    <th>No. BPKB</th>
                    <th>Jenis Kendaraan</th>
                    <th>Type</th>
                    <th>Tahun Produksi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($aset_kendaraan as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->merk ?></td>
                        <td><?= $item->no_plat ?></td>
                        <td><?= $item->no_rangka ?></td>
                        <td><?= $item->no_mesin ?></td>
                        <td><?= $item->no_bpkb ?></td>
                        <td><?= $item->jenis_kendaraan ?></td>
                        <td><?= $item->type ?></td>
                        <td><?= $item->tahun_produksi ?></td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/logistik/aset_kendaraan?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/logistik/aset_kendaraan/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>