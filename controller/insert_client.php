<?php
include_once '../model/Conexao.php';
 include_once '../model/Manager.php';

   $manager = new Manager();

   $data = $_POST;

   if(isset($data) && !empty($data)){
     $manager->insertClient("registros", $data);
     header("location: ../index.php?clien_add_success");
   }

?>
