<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Hello,
            <?php if (logged_in()) : echo $this->session->userdata('name'); ?>
            <?php else : echo "User"; ?>
            <?php endif; ?>
        </h1>
        <p class="lead">KPOP Friends.. share your information</p>
    </div>
</div>
<div class="container">
    <h3>Fandom</h3>
    <?php foreach ($homes as $h) : ?>
        
        <div class="card-group">
            <div class="card">
                <img src="<?= $h['pictures']; ?>" class="card-img-top" width="150" height="250">
                <div class="card-body">
                    <h5 class="card-title"><?= $h['nama']; ?></h5>
                    <p class="card-text"><?= $h['deskripsi']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
</div>