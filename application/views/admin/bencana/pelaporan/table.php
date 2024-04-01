<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <span>
            <a href="#" onclick="exportExcel('<?= base_url('admin/bencana/pelaporan/') ?>')" class="btn btn-sm btn-info my-auto">Export Excel</a>
            <a href="<?= base_url('admin/bencana/pelaporan?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
        </span>
        <!-- <a href="" class="btn btn-info">Tambah data</a> -->
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="datatables_table" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jenis Kejadian</th>
                    <th>Jenis Kegiatan PB</th>
                    <th>Jumlah Terdampak (KK)</th>
                    <th>Jumlah Terdampak (Jiwa)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($pelaporan as $index => $item) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><img src="<?= base_url('uploads/img/pelaporan/' . $item->foto) ?>" height="150px" alt=""></td>
                        <td><?= ($item->tanggal == '0000-00-00' ? '' : date('d-M-Y', strtotime($item->tanggal))) ?></td>
                        <td><?= $item->alamat ?></td>
                        <td><?= $item->kejadian ?></td>
                        <td><?= $item->kegiatan ?></td>
                        <td><?= $item->jumlah_terdampak_kk ?></td>
                        <td><?= $item->jumlah_terdampak_jiwa ?></td>
                        <td>
                            <a class="text-info" href="<?= base_url('admin/bencana/pelaporan?page=edit&id=' . $item->id) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('admin/bencana/pelaporan/nonaktif/' . $item->id) ?>')"><i class="bx bx-trash me-1"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>