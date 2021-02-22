<div class="container">
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="row">
            <div class="col-md-4 alert-<?= $this->session->flashdata('alert'); ?> alert">Post
                <?= $this->session->flashdata('tipe'); ?><?= $this->session->flashdata('notif'); ?></div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-4 d-flex justify-content-between">
            <h1>Artikel</h1>
            <a href="<?= base_url(); ?>post/tambah" class="btn btn-primary align-self-center">Tambah Post</a>
        </div>
    </div>
    <form action="<?= base_url(); ?>post" method="POST">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Diurutkan</label>
                <select name="sort" class="form-control">
                    <option selected value="id_post">Berdasarkan</option>
                    <option value="judul">Judul</option>
                    <option value="idol">Fandom</option>
                </select>

            </div>
            <div class="form-group col-md-4">
                <label>Urutan</label>
                <select name="urutan" class="form-control">
                    <option selected value="ASC">Pilihan Urutan</option>
                    <option value="ASC">A-Z (Ascending)</option>
                    <option value="DESC">Z-A (Descending)</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="">Klik Simpan Untuk Menyimpan Perubahan</label>
                <button type="submit" class="btn btn-primary form-control" name="simpan">Simpan</button>
            </div>
        </div>
    </form>
    <?php if (isset($_POST['simpan'])) : ?>
        <h5>Post Diurutkan Berdasarkan <?= $this->session->userdata['sort']; ?> Secara <?= $this->session->userdata['urutan']; ?></h5>
    <?php endif; ?>
    <?= $this->pagination->create_links(); ?>

    <div class="row mt-3">
        <?php if (isset($posts)) : ?>
            <?php foreach ($posts as $p) : ?>
                <?php
                if ($p['status'] == 'private') :
                    $warna = "text-white bg-dark";
                else :
                    $warna = "text-white bg-info";
                endif;
                ?>
                <div class="col-md-4 <?= $warna; ?> mb-3">
                    <div class="card-header">from: <?= $p['idol']; ?></div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['judul']; ?></h5>
                        <p class="card-text"><?= $p['isi']; ?></p>
                        <br>
                        <?php if ($p['show'] == 'Y') : ?>
                            <small class="align-right">by : <?= $p['name']; ?> </small>
                        <?php endif; ?>
                        <br>
                        <a href="<?= base_url(); ?>post/artikel/<?= $p['id_post']; ?>" class="btn btn-secondary">Lihat &raquo;</a>
                        <?php if (logged_in()) : ?>
                            <a href="<?= base_url(); ?>post/update/<?= $p['id_post']; ?>" class="btn btn-success">Update</a>
                            <a href="<?= base_url(); ?>post/hapus/<?= $p['id_post']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus post tersebut?')">Hapus</a>
                            <hr>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>