
	<div ng-app ng-controller="CtrlApp">
	
	<form id="form" name='form' action="/Pedido/salvar" method="POST" >  	  

		<input type="text" name="prodPedidos" value="{{prodPedidos}}"/>

	   	<h3><i class="glyphicon glyphicon-shopping-cart"></i> Pedido de Compra</h3>
		<hr>
		 <div class="row">
		 	<div class="form-group col-sm-1">
		      <label for="idProduto">Produto</label>
		      <input ng-change="produto = getProduto(idProduto);preco = produto.preco; quantidade = 1" ng-model="idProduto" type="text" name="idProduto" id="idProduto" class="form-control">
		    </div>
		    <div class="form-group col-sm-6">
		      <label for="idProduto">Produto</label>
		      <select ng-change="idProduto = produto.idProduto; preco = produto.preco; quantidade = 1" ng-model="produto" name="produto" id="produto" class="form-control" ng-options="p.nome for p in produtos"></select>
		    </div>
		    <div class="form-group col-sm-2">
		      <label for="quantidade">Quantidade</label>
		      <input type="number" ng-model="quantidade" name="quantidade" id="quantidade" ng-init="quantidade=1" min="1" class="form-control">
		    </div>
		    <div class="form-group col-sm-2">
		     	<label for="preco">Valor Unitário</label>	      
		     	<div class="input-group">
					<span class="input-group-addon">R$</span>
					<input type="text" ng-model="preco" class="form-control">
				</div>
		    </div>
		    <div class="form-group col-sm-1">		
		    	<label for="preco">&nbsp;</label>	          	
		    	<button type="button" class="form-control btn btn-success btn-sm" ng-click="addProduto()"><i class="glyphicon glyphicon-plus"></i>Add</button>
		    </div>
		</div>  
		
		<hr>

		<div class="row" >
			<div class="table-responsive">
			 <table class="table table-hover" id="tableList">
		        <thead>
		          <tr>
		            <th class="col-md-1 text-center">Cód.</th>
		            <th class="col-md-5">Nome</th>
		            <th class="col-md-1 text-center">Qtde</th>
		            <th class="col-md-2 hidden-xs text-right">Preço</th>		            
		            <th class="col-md-2 text-right">Total</th>
		            <th class="col-md-1">&nbsp;</th>		            	           
		          </tr>
		        </thead>
		        <tbody ng-repeat="prod in prodPedidos">
		        	<tr>
		        		<td class="text-center">{{prod.produto.idProduto}}</td>
		        		<td>{{prod.produto.nome}}</td>
		        		<td class="text-center"><input class="form-control" type="number" min="1" ng-model="prod.qtde"></td>
		        		<td class="hidden-xs text-right">{{prod.preco | currency:"R$ "}}</td>
		        		<td class="text-right">{{prod.preco*prod.qtde | currency:"R$ "}}</td>
		        		<td><button type="button" class="btn btn-link btn-xs" title="Excluir" ng:click="delProduto($index)"><i class="glyphicon glyphicon-trash"></i> </button></td>
		        	</tr>
		        </tbody>
		        	<tr>		        		
		        		<td colspan="5" class="text-right"><h3><span class="label label-success">{{sumProduto() | currency:"R$ "}}</span></h3></td>		        		
		        	</tr>
		      </table>
		    </div>
		</div>
		<div class="row pull-right">
			<div class="form-group col-lg-12 col-sm-12">
				<button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
				<a href="<?php echo SH_WEB_ROOT_APP ?>/Pedido/listar" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
			</div>
		</div>
	</form>
	</div>

<script>



	function CtrlApp($scope) {
		
		$scope.alerts = [
			{type : "danger", title : "titulo", text : "texto", close : true}
		];

		$scope.prodPedidos 	= [];
		$scope.produtos 	= [
			{idProduto : 1, nome : "Mouse", preco : 10.00},
			{idProduto : 2, nome : "Teclado", preco : 20.00},
			{idProduto : 3, nome : "Fonte", preco : 35.00},
			{idProduto : 4, nome : "CPU", preco : 70.00}
		];

		$scope.addProduto = function() { 
			$scope.prodPedidos.push({produto : $scope.produto,qtde:$scope.quantidade,preco:$scope.preco});		
		}

		$scope.delProduto = function(index) {
			
			if(confirm("Deseja excluir o produto?"))
				$scope.prodPedidos.splice(index,1);
		}

		$scope.sumProduto = function() 
		{			
		   	var total = 0;
			for(var i=0;i<$scope.prodPedidos.length;i++)
		    	total += $scope.prodPedidos[i].qtde * $scope.prodPedidos[i].preco;
		   	return total;
		}

		$scope.getProduto = function(idProduto) 
		{		
			for(var i=0;i<$scope.produtos.length;i++)
				if($scope.produtos[i].idProduto == idProduto )
		    		return $scope.produtos[i];
		   	return false;
		}
	}

</script>
  
