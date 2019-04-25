<?php

namespace App\Controller;



class HomeController
{
  public function getIndex()
   {
    require_once __DIR__.'/../../views/home.php';
   }

    public function getLogin()
    {
        require_once __DIR__.'/../../views/login.php';
    }
    public  function postLogin(){
      var_dump($_POST);
      die();
    }
    public function getRegister()
    {
        require_once __DIR__.'/../../views/register.php';
    }
    public function getAbout()
    {
        require_once __DIR__.'/../../views/about.php';
    }
}