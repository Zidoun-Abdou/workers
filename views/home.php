<?php
    if (isset($_POST['find'])){
        $data = new WorkersController();
        $workers = $data->findWorkers();
    }else{
        $data = new WorkersController();
        $workers = $data->getAllWorkers();
    }

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <?php  include ('./views/includes/alerts.php');?>
            <div class="card">
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary mb-2 ml-2">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mb-2 ml-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="<?php echo BASE_URL;?>logout" title="Disconnect" class="btn btn-sm btn-link mb-2 ml-2">
                        <i class="fas fa-user"> <?php echo $_SESSION['username'];?></i>
                    </a>
                    <form method="post" class="float-right d-flex flex-row mb-2">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button class="btn btn-info btn-sm" name="find" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Full name</th>
                            <th scope="col">Serial number</th>
                            <th scope="col">Department</th>
                            <th scope="col">Post</th>
                            <th scope="col">Date of Rec</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($workers as $worker): ?>
                        <tr>
                            <td><?php echo $worker['first_name'] .' '.$worker['family_name'] ;?></td>
                            <td><?php echo $worker['serial_number'];?></td>
                            <td><?php echo $worker['department'];?></td>
                            <td><?php echo $worker['post'];?></td>
                            <td><?php echo $worker['date_of_rec'];?></td>
                            <td>
                                <?php echo $worker['status']?
                                    '<span class="badge badge-success">Enabled</span>'
                                    :
                                    '<span class="badge badge-danger">Disabled</span>'
                                ?>
                            </td>
                            <td class="d-flex flex-row">
                                <form action="update" method="post">
                                    <input type="hidden" name="id" value="<?php echo $worker['id'];?>">
                                    <button class="btn-sm btn-warning mr-1"><i class="fa fa-edit"></i></button>
                                </form>
                                <form action="delete" method="post">
                                    <input type="hidden" name="id" value="<?php echo $worker['id'];?>">
                                    <button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
