<?php
    include_once 'Venda.php';
 
  try 

  {   
      session_start(); 
      if(!isset($_SESSION["vendas"])){
         $_SESSION["vendas"] = array();
         $_SESSION["counting"] = 0; 
       }

      $imagem = $_FILES["imagem"];
      $nomeFinal = time().'.jpg';
      if(move_uploaded_file($imagem['tmp_name'], $nomeFinal))
        $tamanhoImg = filesize($nomeFinal); 

      $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));   

      $venda = new Venda();



      $venda->setId($_SESSION["counting"] + 1);
      $_SESSION["counting"]++;
      $venda->setNome($_POST['nome']);
      $venda->setDescricao($_POST['caracteristicas']);
      $venda->setVendedor($_POST['vendedor']);
      $venda->setValor($_POST['valor']);
      $venda->setImagem($mysqlImg);
      $venda->setRecomendo(0);
      $venda->setNaoRecomendo(0);
      array_push($_SESSION["vendas"], $venda);
      unlink($nomeFinal); 
      header('Location: concluido.php');
      }
      
  catch(Exception $e)
    {
	 header('Location: erro.php');  
        }   

?>	
