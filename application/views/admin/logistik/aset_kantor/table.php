<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/logistik/aset_kantor?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tahun Perolehan</th>
                    <th>Nilai Perolehan</th>
                    <th>Sumber</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Serial Number</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Pengguna</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($aset_kantor as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->tahun_perolehan ?></td>
                        <td><?= number_format($item->nilai_perolehan, 2, ",", ".") ?></td>
                        <td><?= $item->sumber ?></td>
                        <td><?= $item->merk ?></td>
                        <td><?= $item->type ?></td>
                        <td><?= $item->serial_number ?></td>
                        <td><?= $item->jumlah ?></td>
                        <td><?= $item->kondisi ?></td>
                        <td><?= $item->pengguna ?></td>
                        <td><?= $item->keterangan ?></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="relative">
                                    <a class="dropdown-item" href="<?= base_url('admin/logistik/aset_kantor?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" onclick="confirmDelete('<?= base_url('admin/logistik/aset_kantor/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>