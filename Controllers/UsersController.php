<?php

class UsersController{

    public function auth()
    {
        //if (isset($_POST['submit'])) {
            $data['username'] = $_POST['username'];
            $result = User::login($data);
            if ($result->username === $_POST['username'] && password_verify($_POST['password'],$result->password)) {

                $_SESSION['logged'] = true;
                $_SESSION['username'] = $result->username;
                Redirect::to('home');
            } else {
                Session::set('error', 'Please verify your name or password ');
                Redirect::to('login');
            }
       // }
    }



    public function register(){
        //if(isset($_POST['submit'])){
            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
            $data = array(
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'password' => $password,
            );
            $result = User::createUser($data);
            if($result === 'ok'){
                Session::set('success','User Created');
                Redirect::to('login');
            }else{
                echo $result;
            }
      //  }
    }

    public static function logout(){
        session_destroy();
    }
}