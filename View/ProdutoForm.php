<div ng-init="init()">	
   <h3><i class="glyphicon glyphicon-pencil"></i> Cadastro de produto</h3>
	<hr>

	 <div class="row">
	 	<div class="form-group col-sm-2">
	      <label for="idCliente">Código</label>
	      <input ng-model="produto.idProduto" type="text" name="idCliente" id="idCliente" readonly="readonly" class="form-control" placeholder="AUTO">
	    </div>	
	 	<div class="form-group col-sm-10">
	      <label for="nome">Nome</label>
	      <input ng-model="produto.nome" type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Produto">
	    </div>	
	 </div>
	 <div class="row">
	 	<div class="form-group col-sm-9">
	      <label>Sub Grupo</label>
	      <select ng-model="produto.subGrupo" ng-options="s.descricao for s in subGrupos" class="form-control"></select>
	    </div>	
	 
	 	<div class="form-group col-sm-3">
	      <label>Preço</label>
	      <input ng-model="produto.preco" type="text" class="form-control" placeholder="Preço">
	    </div>	
	 </div>
	 <div class="row">
	 	<div class="form-group col-sm-12">
	      <label>Detalhes</label>
	      <textarea ng-model="produto.detalhes" class="form-control"></textarea>
	    </div>	
	 </div>
	

	<div class="row pull-right">
		<div class="form-group col-lg-12 col-sm-12">
			<button type="button" ng-click="salvar()" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
	    	<a ng-href="ProdutoListar" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
		</div>
	</div>
</div>


<script type="text/javascript">

		/*function CtrlApp($scope,$http, $templateCache) 
		{
			$scope.produto 	 = {};
			$scope.subGrupos = [{idSubGrupo : 1, idGrupo : 1, descricao: "Desktop"},{idSubGrupo : 2, idGrupo : 1, descricao: "Tablets"}];
			$scope.idProduto = <?php echo defined("HTA_PARAM3") ? HTA_PARAM3 : "false" ?>;

			$scope.init = function (){
				if($scope.idProduto)
					$scope.recuperar();
			}

			$scope.salvar = function (){
				$http({
					method	: "POST",
					url		: "http://localhost/SIHT/Examples/Pedido/Produto/RequestSave", 
					cache 	: $templateCache,
					data 	: $.param({produto : $scope.produto}),
					headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
				}).success(function(data, status) {			      	
			      	if(data.sucess) 
			      		window.location="http://localhost/SIHT/Examples/Pedido/Produto/Listar";
			    }).error(function(data, status) {
			       $scope.setAlerts([{type:"danger",title:"Atenção: ",text:"Erro ao Buscar JSON!"}]);
			    });
			};

			$scope.recuperar = function (){
				$http({
					method	: "POST",
					url		: "http://localhost/SIHT/Examples/Pedido/Produto/RequestEdit/" + $scope.idProduto, 
					cache 	: $templateCache,					
					headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
				}).success(function(data, status) {
					$scope.showAlerts();
			      	$scope.produto = data.produto;
			    }).error(function(data, status) {
			       $scope.setAlerts([{type:"danger",title:"Atenção: ",text:"Erro ao Buscar JSON!"}]);
			    });
			};
		}*/
</script>
  