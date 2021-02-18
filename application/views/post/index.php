<div class="container">
    <?php if($this->session->flashdata('pesan')): ?>
    <div class="row">
        <div class="col-md-4 alert-<?= $this->session->flashdata('alert');?> alert">Post 
        <?= $this->session->flashdata('tipe');?><?= $this->session->flashdata('notif');?></div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-4 d-flex justify-content-between">
            <h1>Artikel</h1>
            <?php if(logged_in()) : ?>
            <a href="<?= base_url(); ?>post/tambah" class="btn btn-primary align-self-center">Tambah Post</a>
            <?php endif;?>
        </div>
    </div>
    <?= $this->pagination->create_links(); ?>
    <div class="row mt-3">
        <?php if (isset($posts)) : ?>
        <?php foreach ($posts as $p) : ?>
        <div class="col-md-4 mb-3">
            <h3 class="text-truncate"><?= $p['judul']; ?></h3>
            <p class=""
                style="-webkit-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;">
                <?= $p['isi']; ?></p>
            <small>fandom : <?= $p['idol']; ?></small> 
            <br>
            <small class="align-right">by : <?= $p['name']; ?> </small>
            <br>
            <a href="<?= base_url(); ?>post/artikel/<?= $p['id_post']; ?>" class="btn btn-primary">Lihat &raquo;</a>
            <a href="<?= base_url(); ?>post/update/<?= $p['id_post']; ?>" class="btn btn-success">Update</a>
            <a href="<?= base_url(); ?>post/hapus/<?= $p['id_post']; ?>" class="btn btn-danger"
                onclick="return confirm('Yakin ingin menghapus post tersebut?')">Hapus</a>
            <hr>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>