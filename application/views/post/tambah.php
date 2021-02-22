<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tambah Post</div>
                <div class="card-body">
                    <form action="<?= base_url() ?>post/tambah" method="POST">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan Judul"
                                value="<?= set_value('judul'); ?>">
                            <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Isi</label>
                            <textarea class="form-control" name="isi" id="isi" cols="30" rows="10"
                                placeholder="Masukan Isi"><?= set_value('isi'); ?></textarea>
                            <?= form_error('isi', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Fandom</label>
                            <input type="text" class="form-control" name="fandom" id="fandom"
                                placeholder="Masukan Idol atau Fandom" value="<?= set_value('fandom'); ?>">
                            <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Blog Untuk Konsumsi</label>
                            <select class="form-control form-control-sm" name="status">
                                <option value="public">Publik</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tunjukan Nama Anda sebagai Penulis?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="show" id="inlineRadio1" value="Y">
                                <label class="form-check-label" for="inlineRadio1">YES</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="show" id="inlineRadio1" value="N">
                                <label class="form-check-label" for="inlineRadio1">NO</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>