<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">Update Post</div>
                <div class="card-body">
                    <form action="<?= base_url() ?>post/update/<?= $post['id_post'] ?>" method="POST">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan Judul" value="<?= $post['judul'];?>">
                            <?= form_error('judul','<small class="text-danger">','</small>') ?>
                        </div>
                        <div class="form-group">
                            <label>Isi</label>
                            <textarea class="form-control" name="isi" id="isi" cols="30" rows="10" placeholder="Masukan Isi"><?= $post['isi'];?></textarea>
                            <?= form_error('judul','<small class="text-danger">','</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url();?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>