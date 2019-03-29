<?php
    include_once 'Venda.php';
 
  try 

  {   
      session_start(); 
      if(!isset($_SESSION["vendas"])){
         $_SESSION["vendas"] = array();
         $_SESSION["counting"] = 0; 
       }

      $imagem = file_get_contents($_FILES['imagem']['tmp_name']);

      $venda = new Venda();



      $venda->setId($_SESSION["counting"] + 1);
      $_SESSION["counting"]++;
      $venda->setNome($_POST['nome']);
      $venda->setDescricao($_POST['caracteristicas']);
      $venda->setVendedor($_POST['vendedor']);
      $venda->setValor($_POST['valor']);
      $venda->setImagem($imagem);
      $venda->setRecomendo(0);
      $venda->setNaoRecomendo(0);
      array_push($_SESSION["vendas"], $venda);
      header('Location: concluido.php');
      }
      
  catch(Exception $e)
    {
	 header('Location: erro.php');  
        }   

?>	
