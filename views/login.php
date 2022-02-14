<?php
    if (isset($_POST['submit'])){
        $loginUser = new UsersController();
        $loginUser->auth();
    }

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <?php  include('./views/includes/alerts.php');?>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="enter your pseudo">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="enter your password">
                        </div>
                        <button class="btn btn-sm btn-primary" name="submit">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php BASE_URL; ?>register" class="btn btn-link">Create a user</a>
                </div>
            </div>
        </div>
    </div>
</div>
