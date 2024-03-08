<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/yankes/' . $jenis_pelayanan . '?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kategori Pelayanan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Tempat</th>
                    <th>Foto Dokumentasi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($pelayanan_kesehatan_sosial as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->kategori_pelayanan ?></td>
                        <td><?= ($item->tanggal_mulai == '0000-00-00' ? '' : date('d-M-Y', strtotime($item->tanggal_mulai))) ?></td>
                        <td><?= ($item->tanggal_selesai == '0000-00-00' ? '' : date('d-M-Y', strtotime($item->tanggal_selesai))) ?></td>
                        <td><?= $item->tempat ?></td>
                        <td><img src="<?= base_url('uploads/img/yankes/' . $jenis_pelayanan . '/' . $item->foto) ?>" height="150px" alt=""></td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/yankes/' . $jenis_pelayanan . '?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/yankes/' . $jenis_pelayanan . '/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>