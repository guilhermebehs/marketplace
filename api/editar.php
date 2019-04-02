<?php

  include_once 'Venda.php';


   session_start(); 

   
  try 

  {
     
       $i = 0;
       $lista = array();
       $lista = $_SESSION["vendas"]; 
        $venda = new Venda();
       do{
          $venda =  $lista[$i];
          if($venda->getId() == $_POST["id"])     
             break;
          $i++;
       }while(true);

       $venda->setDescricao($_POST["caracteristicas"]);
       $venda->setValor($_POST["valor"]);
       if(empty($_FILES[ 'imagem' ][ 'name' ]) != 1){
         $imagem = file_get_contents($_FILES['imagem']['tmp_name']); 
         $venda->setImagem($imagem);
         echo "Entrou aqui";
       }
      
     $lista[$i] = $venda;
     $_SESSION["vendas"] = $lista; 
      
      header('Location: concluido.php');


    }
  catch(Exception $e)
    {
      header('Location: erro.php');  
    }   

?>	