
<?php
function view($file='index')
{
     require_once __DIR__.'/../views/'.$file.'.php';
}
function dd($var)
{
   echo '<pre>';
   var_dump($var);
   echo '</pre>';
   die();
}