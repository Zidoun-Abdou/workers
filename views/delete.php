<?php

if (isset($_POST['id'])) {
    $exitWorker = new WorkersController();
    $exitWorker->deleteWorker();
}
?>