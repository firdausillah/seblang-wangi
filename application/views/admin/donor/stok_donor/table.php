<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <span>
            <a href="#" onclick="exportExcel('<?= base_url('admin/donor/stok_donor/') ?>')" class="btn btn-sm btn-info my-auto">Export Excel</a>
            <a href="<?= base_url('admin/donor/stok_donor?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        </span>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>TANGGAL UPDATE</th>
                    <th>WB-A</th>
                    <th>WB-B</th>
                    <th>WB-AB</th>
                    <th>WB-O</th>
                    <th>PRC-A</th>
                    <th>PRC-B</th>
                    <th>PRC-AB</th>
                    <th>PRC-O</th>
                    <th>TC-A</th>
                    <th>TC-B</th>
                    <th>TC-AB</th>
                    <th>TC-O</th>
                    <th>FPP-A</th>
                    <th>FPP-B</th>
                    <th>FPP-AB</th>
                    <th>FPP-O</th>
                    <th>A</th>
                    <th>B</th>
                    <th>AB</th>
                    <th>O</th>
                    <th>KETERANGAN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($stok_donor as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= ($item->tanggal_update == '0000-00-00' ? '' : date('d-M-Y', strtotime($item->tanggal_update))) ?></td>
                        <td><?= $item->a ?></td>
                        <td><?= $item->b ?></td>
                        <td><?= $item->ab ?></td>
                        <td><?= $item->o ?></td>
                        <td><?= $item->wb_a ?></td>
                        <td><?= $item->wb_b ?></td>
                        <td><?= $item->wb_ab ?></td>
                        <td><?= $item->wb_o ?></td>
                        <td><?= $item->prc_a ?></td>
                        <td><?= $item->prc_b ?></td>
                        <td><?= $item->prc_ab ?></td>
                        <td><?= $item->prc_o ?></td>
                        <td><?= $item->tc_a ?></td>
                        <td><?= $item->tc_b ?></td>
                        <td><?= $item->tc_ab ?></td>
                        <td><?= $item->tc_o ?></td>
                        <td><?= $item->fpp_a ?></td>
                        <td><?= $item->fpp_b ?></td>
                        <td><?= $item->fpp_ab ?></td>
                        <td><?= $item->fpp_o ?></td>
                        <td><?= $item->keterangan ?></td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/donor/stok_donor?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/donor/stok_donor/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>