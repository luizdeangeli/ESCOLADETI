<?php


		$clientes = array();

		$cliente = new stdClass();
		$cliente->idCliente = 1;
		$cliente->nome 		= "Luiz Henrique de Angeli";
		$cliente->cpf 		= "111.111.111-11";

		$clientes[] = $cliente;

		$cliente = new stdClass();
		$cliente->idCliente = 2;
		$cliente->nome 		= "Carlos da Silva";
		$cliente->cpf 		= "222.222.222-22";

		$clientes[] = $cliente;

		echo json_encode($clientes);

?>