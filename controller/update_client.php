<?php

include_once '../model/Conexao.php';
include_once '../model/Manager.php';

 $manager = new Manager();

 $updateClient = $_POST;
 $id = $_POST['id'];

  if(isset($id) && !empty($id)){
    $manager->updateClient("registros", $updateClient, $id);
      header("Location: ../index.php?client_update");
  }

?>
