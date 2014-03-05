<?php


		$produtos = array();

		$produto = new stdClass();
		$produto->idProduto = 1;
		$produto->nome 		= "Fonte Atx";
		$produto->preco 	= "10.00";

		$produtos[] = $produto;

		$produto = new stdClass();
		$produto->idProduto = 2;
		$produto->nome 		= "Teclado sem Fio";
		$produto->preco 	= "50.00";

		$produtos[] = $produto;

		echo json_encode($produtos);

?>