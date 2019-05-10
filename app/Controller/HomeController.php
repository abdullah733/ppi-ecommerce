<?php

namespace App\Controller;

use App\Models\User;


class HomeController
{
  public function getIndex()
   {
    //require_once __DIR__.'/../../views/home.php';
    return view('home');
   }

    public function getRegister()
    {
        //require_once __DIR__.'/../../views/register.php';
        return view('register');
    }
    public function postRegister()
    {

        $errors=[];
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $phoneNumber = $_POST['phoneNumber'];
        $presentAddress = $_POST['presentAddress'];
        $permanentAddress = $_POST['permanentAddress'];
        $nidNumber = $_POST['nidNumber'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_BCRYPT);
        $profile_photo = $_FILES['photo'];


        if($username > 2){
            $errors['username'];
        }
        if ($password < 2) {
            $errors['password'] ;
        }




           User::create([
                'fullName' => $fullName,
                'email' => $email,
                'userName' => $username,
                'phoneNumber' => $phoneNumber,
                'presentAddress' => $presentAddress,
                'permanentAddress' => $permanentAddress,
                'nidNumber' => $nidNumber,
                'password' => $password,
                'photo' => $profile_photo,

            ]);


        $_SESSION['success']='Registation successfully';
        header('Location: /login');
        exit();

        }

    public function getLogin()
    {

        //require_once __DIR__.'/../../views/login.php';
        return view ('login');
    }
    public  function postLogin()
    {
        $errors = [];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // validation

        if ($password < 2) {
            $errors['password'];
        }
        if (empty($errors)) {
            $user = User::select(['id', 'password', 'email', 'username', ])->where('email', $email)->first();
                if (password_verify($password,$user->password)==true) {
                    $_SESSION['success'] = 'Logged in.';
                    $_SESSION['user'] = [
                        'id' => $user->id,
                        'email' => $user->email,
                        'username' => $user->username,
                    ];
                    header('Location: /');
                    exit();
                }

                $errors[] = 'Invalid your data';
                $_SESSION['errors'] = $errors;
                header('Location: /login');

                exit();
            }
            $errors[] = 'User not found';
            $_SESSION['errors'] = $errors;
            header('Location: /login');
            exit();
        }


public function getLogout(){
    unset($_SESSION['user']);
    $_SESSION['success'] = 'user is logout.';
    header('Location: /login');
    exit();
}

    public function getAbout()
    {

    }
}