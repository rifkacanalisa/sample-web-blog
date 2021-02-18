
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Hello, 
                <?php if(logged_in()) : echo $users['name']; ?>
                <?php else : echo "User"; ?>
                <?php endif; ?>
            </h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>