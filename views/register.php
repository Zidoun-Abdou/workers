<?php
if (isset($_POST['submit'])){
    $createUser = new UsersController();
    $createUser->register();
}else{
    $data = new WorkersController();
    $workers = $data->getAllWorkers();
}

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <?php  include('./views/includes/alerts.php');?>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Create a user</h3>
                </div>
                <div class="card-body bg-light">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="fullname" class="form-control" placeholder="enter your full name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="enter your pseudo">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="enter your password">
                        </div>
                        <button class="btn btn-sm btn-primary" name="submit">Create user</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php BASE_URL; ?>login" class="btn btn-link">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
