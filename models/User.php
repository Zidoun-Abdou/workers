<?php

class User{

    public static function login($data){
        $username = $data['username'];
        try {
            $query = 'SELECT * FROM users WHERE username=:username';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
            if ($stmt->execute()){
                return 'ok';
            }
        }catch (PDOException $ex){
            echo 'error' . $ex->getMessage();
        }
    }

    public static function createUser($data){
        $stmt = DB::connect()->prepare('INSERT INTO users(fullname,username,password) VALUES (:fullname,:username,:password)');

        $stmt->bindParam(':fullname',$data['fullname']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':password',$data['password']);

        if ($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }


}