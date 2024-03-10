<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/event/sertifikat?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nama Kegiatan</th>
                    <th>Jenis</th>
                    <th>Sebagai</th>
                    <th>Penyelenggara</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($sertifikat as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td><?= $item->pelatihan_nama ?></td>
                        <td><?= $item->jenis ?></td>
                        <td><?= $item->sebagai ?></td>
                        <td><?= $item->penyelenggara ?></td>
                        <td>
                            <a href="<?= base_url('uploads/file/sertifikat/' . $item->file) ?>" target="_blank" class="btn btn-sm btn-success">Download</a>
                            <a class="text-info" href="<?= base_url('admin/event/sertifikat?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/event/sertifikat/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>