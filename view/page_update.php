
<!--- base de inserção de usuarios no banco de dados --->
<?php
/* base dependencias de layte e estilo*/
include_once "dependencias.php";
include_once "../model/Conexao.php";
include_once "../model/Manager.php";

  $manager = new Manager();

   $id = $_POST['id'];

?>

  <h2 class="text-center">
      Page of Update <i class = "fa fa-user-edit"></i>
  </h2><hr>

  <form method="POST" action="../controller/update_client.php">

     <div class="container">
        <div class = "form-row">

          <?php foreach($manager->getInfo("registros", $id) as $client_info):?>

           <div class="col-md-6">
              Nome: <i class="fa fa-user"></i>
              <input class="form-control" type="text" name="name" required value="<?php echo $client_info['name'] ?>"><br>
         </div>

         <div class="col-md-6">
           E-mail: <i class="fa fa-envelope"></i>
           <input class="form-control" type="email" name="email" required value="<?php echo $client_info['email'] ?>"><br>
       </div>


         <div class="col-md-4">
        CPF: <i class="fa fa-address-card"></i>
             <input class="form-control" type="text" name="cpf" required id="cpf" value="<?php echo $client_info['cpf'] ?>"><br>
        </div>

        <div class="col-md-4">
          Data de Nascimento: <i class="fa fa-calendar"></i>
          <input class="form-control" type="date" name="birth" required value="<?php echo $client_info['birth'] ?>"><br>
      </div>

      <div class="col-md-4">
        Telefone: <i class="fab fa-whatsapp"></i>
        <input class="form-control" type="text" name="phone"  required id="phone" value="<?php echo $client_info['phone'] ?>"><br>
    </div>

     <div class="col-md-12">
       Endereço: <i class="fa fa-map"></i>
       <input class="form-control" type="text" name="address" required value="<?php echo $client_info['address'] ?>"><br>
    </div>


     <div class="col-md-4">
     <?php endforeach; ?>
       <input type="hidden" name="id" value = "<?php echo $client_info['id'] ?>">

         <button class="btn btn-warning btn-lg"></li>

          Update Client <i class="fa fa-user-edit"></i>

         </button><br><br>

         <a href="../index.php">
            Voltar
         </a>
     </div>
  </form>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


    <script type="text/javascript">
    //mascara de formatação dos campos (#id = cpf) e (#id = phone) instrução pre formatada ao digitar
       $(document).ready(function(){
         $("#cpf").mask("000.000.000-00");
         $("#phone").mask("(00) 00000-0000");
       })
    </script>
