<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/pelatihan/event?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Event</th>
                    <th>Periode Pendaftaran</th>
                    <th>Keterangan</th>
                    <th>Poster</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($event as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><a href="<?= base_url('admin/pelatihan/event?page=detail&id=' . $item->id) ?>" class="text-black"><?= $item->nama ?></a></td>
                        <td><?= ($item->tanggal_buka_pendaftaran == '0000-00-00' ? '' : date('d M Y', strtotime($item->tanggal_buka_pendaftaran))) . ' s/d ' . ($item->tanggal_tutup_pendaftaran == '0000-00-00' ? '' : date('d M Y', strtotime($item->tanggal_tutup_pendaftaran))) ?></td>
                        <td><?= $item->keterangan ?></td>
                        <td>
                            <img src="<?= base_url('uploads/img/event/' . $item->foto) ?>" height="200px" alt="">
                        </td>
                        <td>
                            <a class="text-success" href="<?= base_url('admin/pelatihan/event?page=detail&id=' . $item->id) ?>"><i class="bx bx-detail me-1"></i></a>
                            <a class="text-info" href="<?= base_url('admin/pelatihan/event?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/pelatihan/event/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>