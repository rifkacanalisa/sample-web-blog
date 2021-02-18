<div class="container">
    <div class="row">
        <div class="col-md-4 d-flex justify-content-between">
            <h1>Artikel</h1>
            <?php if (logged_in()) : ?>
                <a href="<?= base_url(); ?>post/tambah" class="btn btn-primary align-self-center">Tambah Post</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-8 mb-3">
            <h3 class="text-truncate"><?= $post['judul']; ?></h3>
            <p class="" style="-webkit-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;">
                <?= $post['isi']; ?></p>
            <small>fandom : <?= $post['idol']; ?></small>
            <br>
            <?php if ($post['show'] == 'Y') : ?>
                <small class="align-right">by : <?= $post['name']; ?> </small>
            <?php endif; ?>
            <?php if (logged_in()) : ?>
                <?php
                if ($post['show'] == 'Y') {
                    $show = "Yes";
                } else {
                    $show = "No";
                }
                ?>
                <small class="align-right">Status : <?= $post['status']; ?> </small>
                <small class="align-right">Showing : <?= $show; ?> </small>
                <small class="align-right">by : <?= $post['name']; ?> </small>
                <br>
            <?php endif; ?>
            <a href="<?= base_url(); ?>post" class="btn btn-secondary">Kembali</a>
            <hr>
        </div>

    </div>
</div>