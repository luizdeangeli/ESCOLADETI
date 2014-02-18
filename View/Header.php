<!DOCTYPE html>
<html lang="pt" ng-app="shApp">
  <head>
    <title>Project Name</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <link href="./Lib/css/bootstrap.min.css" rel="stylesheet">    
    <link href="./Lib/css/local.css" rel="stylesheet">

    <script src="./Lib/js/jquery.min.js"></script>
    <script src="./Lib/js/angular.min.js"></script>
    <script src="./Lib/js/angular-route.min.js"></script>
    <script src="./Lib/js/angular.locale.pt-br.min.js"></script>
    <script src="./Lib/js/jquery.tablesorter.min.js"></script>    
    <script src="./Lib/js/jquery.maskedinput.min.js"></script>    
    <script src="./Lib/js/jquery.validate.min.js"></script>
    <script src="./Lib/js/bootstrap.min.js"></script>    
    <script src="./Lib/js/local.js"></script>

   
    <script type="text/javascript">
    //this is here to make plunkr work with AngularJS routing
    angular.element(document.getElementsByTagName('head')).append(angular.element('<base href="' + window.location.pathname + '" />'));
    </script>

  </head>
  <body ng-controller="MainCntl as main">

    <nav id="navbar-example" role="navigation" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
          
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">            
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            
            <a class="navbar-brand" href="/"><i class="glyphicon glyphicon-globe"></i> Project Name</a>
          </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav">              
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="Cliente/listar">Cliente</a></li>
                    <li><a href="Produto/Listar">Produto</a></li>
                    <li><a href="">Grupo</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Processos <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="Pedido/Novo">Pedido</a></li>
                   
                  </ul>
                </li>
              </ul>            
              <ul class="nav navbar-nav navbar-right">              
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/Configuracao/config"><i class="glyphicon glyphicon-cog"></i> Configurações</a></li>
                    <li><a tabindex="-1" href="/Sobre"><i class="glyphicon glyphicon-info-sign"></i> Sobre</a></li>                  
                    <li class="divider"></li>                  
                    <li><a tabindex="-1" href="/Login/sair"><i class="glyphicon glyphicon-off"></i> Sair</a></li>                  
                  </ul>                
                </li>
              </ul>
            </div>
           
           
        </div>        
      </nav>

      <div class="container">

        