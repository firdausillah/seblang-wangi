<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/donor/stok_donor/save')) ?>
        <input type="hidden" name="id" value="<?= @$stok_donor->id ?>">
        <div class="mb-3">
            <label class="form-label" for="tanggal_update">Tanggal Update <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="tanggal_update" id="tanggal_update" value="<?= @$stok_donor->tanggal_update ?>" required>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="a">Jumlah A</label>
                    <input type="number" name="a" id="a" value="<?= @$stok_donor->a ?>" class="form-control" placeholder="Jumlah A">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="b">Jumlah B</label>
                    <input type="number" name="b" id="b" value="<?= @$stok_donor->b ?>" class="form-control" placeholder="Jumlah B">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="ab">Jumlah AB</label>
                    <input type="number" name="ab" id="ab" value="<?= @$stok_donor->ab ?>" class="form-control" placeholder="Jumlah AB">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="o">Jumlah O</label>
                    <input type="number" name="o" id="o" value="<?= @$stok_donor->o ?>" class="form-control" placeholder="Jumlah O">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="wb_a">Jumlah WB-A</label>
                    <input type="number" name="wb_a" id="wb_a" value="<?= @$stok_donor->wb_a ?>" class="form-control" placeholder="Jumlah WB-A">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="wb_b">Jumlah WB-B</label>
                    <input type="number" name="wb_b" id="wb_b" value="<?= @$stok_donor->wb_b ?>" class="form-control" placeholder="Jumlah WB-B">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="wb_ab">Jumlah WB-AB</label>
                    <input type="number" name="wb_ab" id="wb_ab" value="<?= @$stok_donor->wb_ab ?>" class="form-control" placeholder="Jumlah WB-AB">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="wb_o">Jumlah WB-O</label>
                    <input type="number" name="wb_o" id="wb_o" value="<?= @$stok_donor->wb_o ?>" class="form-control" placeholder="Jumlah WB-O">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="prc_a">Jumlah PRC-A</label>
                    <input type="number" name="prc_a" id="prc_a" value="<?= @$stok_donor->prc_a ?>" class="form-control" placeholder="Jumlah PRC-A">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="prc_b">Jumlah PRC-B</label>
                    <input type="number" name="prc_b" id="prc_b" value="<?= @$stok_donor->prc_b ?>" class="form-control" placeholder="Jumlah PRC-B">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="prc_ab">Jumlah PRC-AB</label>
                    <input type="number" name="prc_ab" id="prc_ab" value="<?= @$stok_donor->prc_ab ?>" class="form-control" placeholder="Jumlah PRC-AB">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="prc_o">Jumlah PRC-O</label>
                    <input type="number" name="prc_o" id="prc_o" value="<?= @$stok_donor->prc_o ?>" class="form-control" placeholder="Jumlah PRC-O">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="tc_a">Jumlah TC-A</label>
                    <input type="number" name="tc_a" id="tc_a" value="<?= @$stok_donor->tc_a ?>" class="form-control" placeholder="Jumlah A">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="tc_b">Jumlah TC-B</label>
                    <input type="number" name="tc_b" id="tc_b" value="<?= @$stok_donor->tc_b ?>" class="form-control" placeholder="Jumlah B">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="tc_ab">Jumlah TC-AB</label>
                    <input type="number" name="tc_ab" id="tc_ab" value="<?= @$stok_donor->tc_ab ?>" class="form-control" placeholder="Jumlah AB">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="tc_o">Jumlah TC-O</label>
                    <input type="number" name="tc_o" id="tc_o" value="<?= @$stok_donor->tc_o ?>" class="form-control" placeholder="Jumlah O">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="fpp_a">Jumlah FPP-A</label>
                    <input type="number" name="fpp_a" id="fpp_a" value="<?= @$stok_donor->fpp_a ?>" class="form-control" placeholder="Jumlah FPP-A">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="fpp_b">Jumlah FPP-B</label>
                    <input type="number" name="fpp_b" id="fpp_b" value="<?= @$stok_donor->fpp_b ?>" class="form-control" placeholder="Jumlah FPP-B">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="fpp_ab">Jumlah FPP-AB</label>
                    <input type="number" name="fpp_ab" id="fpp_ab" value="<?= @$stok_donor->fpp_ab ?>" class="form-control" placeholder="Jumlah FPP-AB">
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="fpp_o">Jumlah FPP-O</label>
                    <input type="number" name="fpp_o" id="fpp_o" value="<?= @$stok_donor->fpp_o ?>" class="form-control" placeholder="Jumlah FPP-O">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" value="<?= @$stok_donor->keterangan ?>" class="form-control" placeholder="Keterangan">
        </div>
        <a href="<?= base_url() ?>admin/donor/stok_donor" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>