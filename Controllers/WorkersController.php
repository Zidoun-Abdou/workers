<?php

class WorkersController{

    public function getAllWorkers(){
        $workers = Worker::getAll();
        return $workers;
    }

    public function getOneWorker(){
        if (isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $worker = Worker::getWorker($data);
            return $worker;
        }
    }

    public function findWorkers(){
        if (isset($_POST['search'])){
            $data['search'] = $_POST['search'];
        }
        $workers = Worker::searchWorker($data);
        return $workers;
    }

    public function updateWorker(){
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $_POST['id'],
                'family' => $_POST['family'],
                'first' => $_POST['first'],
                'serial' => $_POST['serial'],
                'depart' => $_POST['depart'],
                'post' => $_POST['post'],
                'date_rec' => $_POST['date_rec'],
                'status' => $_POST['status'],
            );
            $result = Worker::update($data);
            if ($result === 'ok') {
                Session::set('info','Worker Updated');
                Redirect::to('home');
            } else {
                echo $result;
            }
        }
    }

    public function addWorker(){
            $data = array(
                'family' => $_POST['family'],
                'first' => $_POST['first'],
                'serial' => $_POST['serial'],
                'depart' => $_POST['depart'],
                'post' => $_POST['post'],
                'date_rec' => $_POST['date_rec'],
                'status' => $_POST['status'],
            );
            $result = Worker::add($data);
            if($result === 'ok'){
                Session::set('success','Worker Added');
                Redirect::to('home');
            }else{
                echo $result;
            }
        }


    public function deleteWorker(){
            $data['id'] = $_POST['id'];
            $result = Worker::delete($data);
        if($result === 'ok'){
            Session::set('error','Worker Deleted');
            Redirect::to('home');
        }else{
            echo $result;
        }
    }

}