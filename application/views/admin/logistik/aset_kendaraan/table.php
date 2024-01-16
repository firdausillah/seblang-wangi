<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/logistik/aset_kendaraan?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
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
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="relative">
                                    <a class="dropdown-item" href="<?= base_url('admin/logistik/aset_kendaraan?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" onclick="confirmDelete('<?= base_url('admin/logistik/aset_kendaraan/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>