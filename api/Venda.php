<?php
  class Venda{

    private $id;
	private $nome ;
	private $vendedor;
	private $valor;
	private $descricao;
	private $imagem;
	private $recomendo;
	private $naoRecomendo;


	public function setId($id){
         $this->id = $id;
	 }
	 
	 public function setNome($nome){
         $this->nome = $nome;
	 }

	 public function setVendedor($vendedor){
         $this->vendedor = $vendedor;
	 }

	 public function setDescricao($descricao){
         $this->descricao = $descricao;
	 }

	 public function setValor($valor){
         $this->valor = $valor;
	 }

	 public function setImagem($imagem){
         $this->imagem = $imagem;
	 }

	 public function setRecomendo($recomendo){
         $this->recomendo = $recomendo;
	 }

	 public function setNaoRecomendo($naoRecomendo){
         $this->naoRecomendo = $naoRecomendo;
	 }



     public function getId(){
         return $this->id;
	 }


	 public function getNome(){
         return $this->nome;
	 }

	 public function getVendedor(){
        return $this->vendedor;
	 }

	 public function getDescricao(){
         return $this->descricao;
	 }

	 public function getValor(){
         return $this->valor;
	 }

	 public function getImagem(){
         return $this->imagem;
	 }

	 public function getRecomendo(){
         return $this->recomendo;
	 }

	 public function getNaoRecomendo(){
        return $this->naoRecomendo;
	 }

	 



	}

?>