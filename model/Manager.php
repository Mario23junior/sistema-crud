<?php

require_once "Conexao.php";

  class Manager extends Conexao {
   //=========== Preparando e inserindo os dados no banco de dado ================= //
    public function insertClient($table, $data) {
     $pdo = parent::get_instance();
     $fields = implode("," , array_keys($data));
     $values = ":" . implode(", :", array_keys($data));
     $sql = "INSERT INTO $table ($fields) VALUES ($values)";
     $statement  = $pdo->prepare($sql);

      foreach ($data as $key => $value) {
        $statement->bindValue(":$key", $value, PDO::PARAM_STR);
      }
      $statement->execute();
    }
    //=========== FIM DA OPERÇÃO DE INSERÇÃO E PREPARAÇÃO PARA INSERÇÃO ================= //


//============== metodo de leitura de dados ============ //
       public function listClient($table){
          $pdo = parent::get_instance();
          $sql = "SELECT * FROM $table ORDER BY name ASC";
          $statement = $pdo->query($sql);
          $statement->execute();

           return $statement->fetchAll();
       }
//=============== fim do metodo de inserção =============== //


// =============== metodo de eclusao de id do formulrios =======
        public function deletClient($table, $id) {
          $pdo = parent::get_instance();
          $sql = "DELETE FROM $table WHERE id = :ID";
          $statement = $pdo->prepare($sql);
          $statement->bindValue(":ID", $id);

          $statement->execute();
        }
   // =============== fim do metodo de atualização ======= //



//=========== METODO PARA ATUALIZAÇÃO  DOS DADOS JÁ CADASTRADOS =========================== //
     public function getInfo($table, $id){
       $pdo = parent::get_instance();
       $sql = "SELECT * FROM $table WHERE id = :id";
       $statement = $pdo->prepare($sql);
       $statement->bindValue(":id",$id);
       $statement->execute();

        return $statement->fetchAll();
     }
//================= FIM DO METODO PARA EDIÇÃO DE DADOS ======================================= //


//================= CONFIRMANDO COMANDO DE ATUALIZAÇÃO DOS DADOS 2 ===================//

    public function updateClient($table, $data, $id){
        $pdo = parent::get_instance();
        $new_values = "";
        foreach($data as $key => $value){
          $new_values .= "$key=:$key, ";
        }
         $new_values = substr($new_values, 0, -2);
         $sql = "UPDATE $table SET $new_values WHERE ID = :id";
         $statement = $pdo->prepare($sql);
          foreach($data as $key => $value){
            $statement->bindValue(":$key", $value, PDO::PARAM_STR);
          }
          $statement->execute();

    }
 //================= FIM DA  COMANDO DE ATUALIZAÇÃO DOS DADOS ===================//





  }





?>
