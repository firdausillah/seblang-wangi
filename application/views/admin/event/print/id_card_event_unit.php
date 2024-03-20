<div style="display: flex; flex-wrap: wrap;">
    <?php foreach ($persons as $index => $item) : ?>
        <?= ($index % 4 == 0 ? '<div class="page-break">' : '') ?>
        <div style="position: relative; height: 468px; width: 359px; background-size: 100% 100%; background-image: url('<?= base_url('assets/img/id-card.jpg') ?>');  display: flex; flex-wrap: wrap; align-content: between; overflow: hidden;">
            <div style="margin-left: auto; margin-right: auto; margin-top:100px">
                <img src="<?= $base_url . $item->foto ?>" width="130px" style="margin:5px; border:1px black;" alt="">
            </div>
            <div style="text-align: center; width: 100%; margin-left:20px; margin-right:20px;">
                <div>
                    <h3 style="text-transform: uppercase; margin-bottom:-15px;"><?= $item->relawan_nama ?></h3>
                    <p><?= $item->relawan_kode ?></p>
                </div>
                <p style="uppercase; margin-bottom:-15px;"><?= $item->unit_nama ?></p>
                <p style="margin-bottom:-10px; font-size: larger; font-weight: bold;">Peserta</p>
                <p><?= $item->event_nama ?></p>
            </div>
        </div>
        <?= ($index % 4 == 0 ? '</div>' : '') ?>
    <?php endforeach; ?>
</div>