<?php

class Worker{

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM workers_info');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public static function getWorker($data){
        $id = $data['id'];
        try {
        $query = 'SELECT * FROM workers_info WHERE id=:id';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":id" => $id));
        $worker = $stmt->fetch(PDO::FETCH_OBJ);
        return $worker;

        }catch (PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }


    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO workers_info(family_name,first_name,serial_number,department,post,date_of_rec,status) VALUES (:family,:first,:serial,:depart,:post,:date_rec,:status)');

        $stmt->bindParam(':family',$data['family']);
        $stmt->bindParam(':first',$data['first']);
        $stmt->bindParam(':serial',$data['serial']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':post',$data['post']);
        $stmt->bindParam(':date_rec',$data['date_rec']);
        $stmt->bindParam(':status',$data['status']);

        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }


    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE workers_info SET first_name = :first,family_name = :family ,serial_number = :serial,department = :depart,post = :post,date_of_rec = :date_rec,status = :status WHERE id = :id');

        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':family',$data['family']);
        $stmt->bindParam(':first',$data['first']);
        $stmt->bindParam(':serial',$data['serial']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':post',$data['post']);
        $stmt->bindParam(':date_rec',$data['date_rec']);
        $stmt->bindParam(':status',$data['status']);

        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }


    public static function delete($data){
        $id = $data['id'];
        try {
            $query = 'DELETE FROM workers_info WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if ($stmt->execute()){
                return 'ok';
            }
        }catch (PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }

    public static function searchWorker($data){
        $search = $data['search'];
        try {
            $query = 'SELECT * FROM workers_info WHERE first_name LIKE ? OR family_name LIKE ?';
            //die(print_r($data));
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array('%' .$search. '%','%' .$search. '%'));
            $workers = $stmt->fetchAll();
            return $workers;
            if ($stmt->execute()){
                return 'ok';
            }
        }catch (PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }

}

