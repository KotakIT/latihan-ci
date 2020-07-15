<div class="row">
    <div class="col-lg-6 col-sm-12">
        <?= form_open('mahasiswa/update') ?>
            <div class="form-group">
                <label>NIM</label>
                <input type="number" value="<?= $query->nim ?>" name="nim" class="form-control" readonly>
                <?= form_error('nim') ?>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?= $query->nama_lengkap ?>" class="form-control">
                <?= form_error('nama') ?>
            </div>
            <div class="form-group">
                <label>Asal Kota</label>
                <input type="text" name="kota" value="<?= $query->kota ?>" class="form-control">
                <?= form_error('kota') ?>
            </div>
            <div class="form-group">
                <label>TTL</label>
                <input type="date" name="ttl" value="<?= $query->ttl ?>" class="form-control">
                <?= form_error('ttl') ?>
            </div>
            <button type="submit" class="btn btn-primary form-control">Simpan</button>
        </form>
    </div>
</div>