<div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><?= $title ? $title : 'Judul Page' ?></h3>
        </div>

    </div>
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <?= form_open_multipart(base_url('admin/user/update/' . $user->id)) ?>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" required>
                        <input type="hidden" class="form-control" name="role" value="<?= $user->role ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $user->username ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">password</label>
                        <input type="text" class="form-control" name="password" value="<?= $user->password ?>" required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url() ?>admin/user" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>