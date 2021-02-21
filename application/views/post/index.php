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
            <?php if (logged_in()) : ?>
                <a href="<?= base_url(); ?>post/tambah" class="btn btn-primary align-self-center">Tambah Post</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <form action="<?= base_url(); ?>post" method="POST">
                <label>Diurutkan</label>
                <select name="sort" class="form-control">
                    <option selected>Berdasarkan</option>
                    <option value="judul">Judul</option>
                    <option value="idol">Fandom</option>
                </select>
                <label>Urutan</label>
                <select name="urutan" class="form-control">
                    <option selected>Pilihan Urutan</option>
                    <option value="ASC">A-Z (Ascending)</option>
                    <option value="DESC">Z-A (Descending)</option>
                </select>
                <button type="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
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