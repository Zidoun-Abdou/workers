<?php

if (isset($_POST['submit'])) {
    $newWorker = new WorkersController();
    $newWorker->addWorker();
}
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Add a worker</div>
                <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mb-2 ml-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form method="post">
                        <div class="form-groupe">
                            <label for="first">First name</label>
                            <input type="text" name="first" class="form-control" placeholder="Please insert a First name">
                        </div>
                        <div class="form-groupe">
                            <label for="family">Family name</label>
                            <input type="text" name="family" class="form-control" placeholder="Please insert a Family name">
                        </div>
                        <div class="form-groupe">
                            <label for="serial">Serial number</label>
                            <input type="text" name="serial" class="form-control" placeholder="Please insert a Serial number">
                        </div>
                        <div class="form-groupe">
                            <label for="depart">Department</label>
                            <input type="text" name="depart" class="form-control" placeholder="Please insert a Department">
                        </div>
                        <div class="form-groupe">
                            <label for="post">Post*</label>
                            <input type="text" name="post" class="form-control" placeholder="Please insert a Post">
                        </div>
                        <div class="form-groupe">
                            <label for="date_rec">Date of recruitment</label>
                            <input type="date" name="date_rec" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Validate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
