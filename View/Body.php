  <a href="Produto/Listar">Lista</a> |
  <a href="Produto/Novo">Cadastro</a> |
  <a href="Produto/Editar/13138">Editar </a>


  <div ng-repeat="alert in alerts">
    <div class="alert alert-dismissable alert-{{alert.type}}">
      <button ng-if="alert.close" type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>{{alert.title}}</strong>
      {{alert.text}}
    </div>
  </div>
  
  <div ng-view></div>
  

  <script type="text/javascript">

      
    angular.module('shApp', ['ngRoute'], function($routeProvider, $locationProvider) {

      $routeProvider.when('/Produto/Listar', {
          templateUrl : 'View/ProdutoLista.php',
          controller  : 'ProdutoListaCtrl'
          //controllerAs : 'produto'
        }
      );
     
      $routeProvider.when('/Produto/Novo', {
          templateUrl : 'View/ProdutoForm.php',
          controller  : ProdutoCadastrarCtrl,
          //controllerAs : 'produto'
        }
      );

      $routeProvider.when('/Produto/Editar/:idProduto', { 
          templateUrl : 'View/ProdutoForm.php',
          controller  : ProdutoCadastrarCtrl,
          //controllerAs : 'produto'
        }
      );

       $routeProvider.when('/Pedido/Novo', {
          templateUrl : 'View/PedidoForm.php',
          //controller  : ProdutoCadastrarCtrl,
          //controllerAs : 'produto'
        }
      );

      $routeProvider.when('/Home', { 
          templateUrl : 'View/Principal.php',
          controller  : ProdutoCadastrarCtrl,
          //controllerAs : 'produto'
        }
      );

      //$routeProvider.otherwise({redirectTo: 'Home'});

      $locationProvider.html5Mode(true); //assim tem usar #
    });


    function ProdutoCadastrarCtrl($scope, $routeParams, $http,$location) 
    {
      $scope.subGrupos = [{idSubGrupo : 1, idGrupo : 1, descricao: "Desktop"},{idSubGrupo : 2, idGrupo : 1, descricao: "Tablets"}];
     
      $scope.init = function (){
          if($routeParams.idProduto)
            $scope.recuperar($routeParams.idProduto);
      }

      $scope.salvar = function (){
        $http({
            method  : "POST",
            url   : "http://localhost/SIHT/Examples/Pedido/Produto/RequestSave", 
            //cache   : $templateCache,
            data  : $.param({produto : $scope.produto}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
          }).success(function(data, status) {             
              $location.path( "/ProdutoListar" );
            }).error(function(data, status) {
              $scope.setAlerts([{type:"danger",title:"Atenção: ",text:"Erro ao Buscar JSON!"}]);
            });
        };

      $scope.recuperar = function (idProduto){       
        $http({
            method  : "POST",
            url   : "http://localhost/SIHT/Examples/Pedido/Produto/RequestEdit/" + idProduto, 
            //cache   : $templateCache,
            //headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
          }).success(function(data, status) {
                $scope.showAlerts();
                $scope.produto = data.produto;
            }).error(function(data, status) {
                $scope.setAlerts([{type:"danger",title:"Atenção: ",text:"Erro ao Buscar JSON!"}]);
            });
        };

     

    }

    function ProdutoListaCtrl($scope,$http) {

      $scope.init = function (){
        $scope.listar();
      }

      $scope.limpar = function (){
        $scope.busca={};
        //$scope.listar();
      }

      $scope.listar = function (){
        $http({
          method  : "POST",
          url   : "http://localhost/SIHT/Examples/Pedido/Produto/RequestList"          
          //headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function(data, status) {
            $scope.produtos = data.produtos;
            $scope.showAlerts();
        }).error(function(data, status) {
           $scope.setAlerts([{type:"danger",title:"Atenção: ",text:"Erro ao Buscar JSON!"}]);
        });
      };

      $scope.excluir = function (object){
        if(!confirm("Confirma exclusão do Produto:" + object.nome +  "?"))
          return;
        
        $http({
          method  : "POST",
          url   : "http://localhost/SIHT/Examples/Pedido/Produto/RequestDelete",
          //cache   : $templateCache,
          data  : $.param({object : object}),
          headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=ISO8859-1'}
        }).success(function(data, status) {         
              $scope.showAlerts();
              if(data.sucess) 
                $scope.listar();
          }).error(function(data, status) {
             $scope.setAlerts([{type:"danger",title:"Atenção: ",text:"Erro ao Buscar JSON!"}]);
          });          
      };

      //$scope.listar();
                  
    }

   
    function MainCntl($scope,$http, $templateCache, $route, $routeParams, $location) 
    {
        this.$route = $route;
        this.$location = $location;
        this.$routeParams = $routeParams;

        $scope.alerts   = [];
       
        $scope.init = function (){               
            $scope.showAlerts();
        }

        $scope.range = function(min, max, step){
          step = (step == undefined) ? 1 : step;
          var input = [];
          for (var i=min; i<=max; i=i+step) input.push(i);
          return input;
        };

       
        $scope.setAlerts = function (alerts){
          for(var i=0;i<alerts.length;i++)
            $scope.alerts.push(alerts[i]);
        }

        $scope.showAlerts = function (){
          $http({
            method  : "POST",
            url     : "http://localhost/SIHT/Examples/Pedido/Alert/RequestAlerts", 
            cache   : $templateCache,
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
          }).success(function(data, status) {                   
                $scope.setAlerts(data.alerts);
          });
        };
    }

  </script>   