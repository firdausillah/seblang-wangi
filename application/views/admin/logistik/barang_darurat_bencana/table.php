<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/logistik/barang_darurat_bencana?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Stok Akhir</th>
                    <th>Sirkulasi</th>
                    <th>Tanggal</th>
                    <th>Satuan</th>
                    <th>Donor</th>
                    <th>Dari</th>
                    <th>Tanggal Expired</th>
                    <th>Expired</th>
                    <th>Stok Awal</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($barang_darurat_bencana as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->merk ?></td>
                        <td><?= $item->stok_akhir ?></td>
                        <td><?= $item->sirkulasi ?></td>
                        <td><?= ($item->tanggal == '0000-00-00' ? '' : date('d-M-Y', strtotime($item->tanggal))) ?></td>
                        <td><?= $item->satuan ?></td>
                        <td><?= $item->donor ?></td>
                        <td><?= $item->dari ?></td>
                        <td><?= ($item->tanggal_expired=='0000-00-00'?'':date('d-M-Y', strtotime($item->tanggal_expired))) ?></td>
                        <td><?= ($item->expired=='0000-00-00'?'': $item->expired) ?></td>
                        <td><?= $item->stok_awal ?></td>
                        <td><?= $item->jumlah ?></td>
                        <td><?= $item->keterangan ?></td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/logistik/barang_darurat_bencana?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/logistik/barang_darurat_bencana/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>