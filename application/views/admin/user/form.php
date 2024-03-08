<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/user/save')) ?>
        <input type="hidden" name="id" value="<?= @$user->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$user->tanggal ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">username <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="username" id="username" value="<?= @$user->username ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="password" value="<?= @$user->password ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="role">role <span class="text-danger">*</span></label>
            <select class="form-select" name="role" id="role" width="100px" required>
                <option value="">--Pilih--</option>
                <option <?= @$user->role == 'superadmin' ? 'selected' : '' ?> value='superadmin'>Superadmin</option>
                <option <?= @$user->role == 'udd' ? 'selected' : '' ?> value='udd'>UDD</option>
            </select>
        </div>
        <a href="<?= base_url() ?>admin/user" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>