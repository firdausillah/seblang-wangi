<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('unit/event/pengajuan?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Event</th>
                    <th>File Informasi</th>
                    <th>Poster</th>
                    <th>Status Pendaftaran</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($event_unit as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><a href="<?= base_url('unit/event/pengajuan?page=detail&id=' . $item->id) ?>" class="text-black"><?= $item->nama ?></a></td>
                        <td>
                            <a href="<?= base_url('uploads/file/event/admin/' . $item->file_info) ?>" target="_blank" class="text-black"><span class="text-info"><?= $item->file_info ?></span></a>
                        </td>
                        <td>
                            <a href="<?= base_url('uploads/img/event/admin/' . $item->foto) ?>" target="_blank">
                                <img src="<?= base_url('uploads/img/event/admin/' . $item->foto) ?>" height="200px" alt="">
                            </a>
                        </td>
                        <td><?= ($item->is_approve == 1 ? '<span class="badge bg-label-success">Disetujui</span>': '<span class="badge bg-label-warning">Diperiksa</span>') ?></td>
                        <td>
                            <a class="text-success" href="<?= base_url('unit/event/pengajuan?page=detail&id=' . $item->id) ?>"><i class="bx bx-detail me-1"></i></a>
                            <a class="text-info" href="<?= base_url('unit/event/pengajuan?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('unit/event/pengajuan/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>