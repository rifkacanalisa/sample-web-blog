
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Hello, 
                <?php if(logged_in()) : echo $this->session->userdata('name'); ?>
                <?php else : echo "User"; ?>
                <?php endif; ?>
            </h1>
            <p class="lead">KPOP Friends.. share your information</p>
        </div>
    </div>