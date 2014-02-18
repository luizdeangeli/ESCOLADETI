<?php
  	$this->setView("Header");

  	$REG_PG 	= 5;
	$NUM_PG 	= defined("HTA_PARAM3") && is_numeric(HTA_PARAM3)? HTA_PARAM3 : 1;
?>

	
	<script >
		$(function() {
			$("table#tableList").tablesorter({ sortList: [[1,0]] });
		});

		/*$(function () {
            $('#tableList tr').click(function () {                
                $(this).addClass('lineDiff').siblings().removeClass('lineDiff');
            });
        });*/

	</script>		

		<h3><i class="glyphicon glyphicon-list"></i> Lista de cliente(s)</h3>
		<hr>
		    
	    <div class="row">
	    	<div class="col-lg-12">
				<a href="#filter" data-toggle="modal" class="btn btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> Buscar</a>
	          	<a href="<?php echo SH_WEB_ROOT_APP ?>/Cliente/listar" class="btn btn-danger btn-sm" <?php if(!$this->post) echo "disabled" ?>><i class="glyphicon glyphicon-remove"></i> Limpar</a>
	    		<a href="<?php echo SH_WEB_ROOT_APP ?>/Cliente/cadastrar" class="btn btn-primary pull-right btn-sm"><i class="glyphicon glyphicon-plus"></i> Novo Cliente</a>
	    	</div>
	    </div>

		<form  class="form-horizontal" action="<?php echo SH_WEB_ROOT_APP ?>/Cliente/listar" method="POST">
		  <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title"><i class="glyphicon glyphicon-search"></i> Busca de clientes</h4>
		        </div>
		        <div class="modal-body">
		        	<div class="form-group">
						<label class="col-sm-2" for="filIdCliente">Código</label>
						<div class="col-sm-4">
					      <input name="filIdCliente" id="filIdCliente" type="text" class="form-control" placeholder="Código do Cliente" value="<?php echo isset($this->post["filIdCliente"]) ? $this->post["filIdCliente"] : ""?>">							
					    </div>
					    <!--
					    <div class="col-sm-6">
						    <div class="input-group">
						      <input type="text" class="form-control">
						      <div class="input-group-btn">
						        <select name="filEstado" class="form-control">
						        	<option>Contenha</option>
						        	<option>Igual</option>
						        	<option>Maior</option>
						        	<option>Menor</option>
						        </select>
						      </div>
						    </div>						    
					  	</div>
					  -->
					</div>
		        	<div class="form-group">
						<label class="col-sm-2" for="filCpf">CPF</label>
						<div class="col-sm-4">
					      <input name="filCpf" id="filCpf" type="text" class="form-control maskCpf" placeholder="Número do CPF" value="<?php echo isset($this->post["filCpf"]) ? $this->post["filCpf"] : ""?>">							
					    </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2" for="filNome">Nome</label>
						<div class="col-sm-10">
					      <input name="filNome" id="filNome" type="text" class="form-control" placeholder="Nome do Cliente" value="<?php echo isset($this->post["filNome"]) ? $this->post["filNome"] : ""?>">
					    </div>
					</div>
					<div class="form-group">							
						<label class="col-sm-2" for="filEstado">Estado</label>
						<div class="col-sm-10">
					      <select name="filEstado" class="form-control">
						      	<option></option>
							      <?php
							      	if(is_array(Util::$estados))
							      	{
								      	foreach (Util::$estados as $estado => $nome) 
								      	{
								      		$selected = $estado == $this->post["filEstado"] ? "selected" : "";
								      		echo "<option value='{$estado}' {$selected}>{$nome}</option>";
								      	}			      	
								    }
							      ?>		      			      	
						      </select>
					    </div>
					</div>
					<div class="form-group">							
						<label class="col-sm-2" for="filCidade">Cidade</label>
						<div class="col-sm-10">
					      <input name="filCidade" id="filCidade" type="text" class="form-control" placeholder="Cidade do Cliente" value="<?php echo isset($this->post["filCidade"]) ? $this->post["filCidade"] : ""?>">
					    </div>
					</div>												
			    </div>
		        <div class="modal-footer" >
		        	<button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-search"></i> Buscar</button>
		          	<button type="button" class="btn btn-danger btn-sm" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
		        </div>
		      </div>
		    </div>
		  </div>
		</form>

	    <hr>

		<div class="table-responsive">
		 <table class="table table-hover" id="tableList">
	        <thead>
	          <tr>
	            <th class="col-md-1 text-center">Cód.</th>
	            <th class="col-md-5">Nome</th>
	            <th class="col-md-1 hidden-xs">Estado</th>
	            <th class="col-md-2 hidden-xs">Cidade</th>		            
	            <th class="col-md-2 hidden-xs">CPF</th>
	            <th class="col-md-1 text-center">Ações</th>		           
	          </tr>
	        </thead>
	        <tbody>
	        	<?php		        		

	        		for($i=(($NUM_PG-1) * $REG_PG);$i<($REG_PG * ($NUM_PG)) && $i<count($this->clientes);$i++)
	        		{
	        			$cliente = $this->clientes[$i];

	        			$urlAlterar = SH_WEB_ROOT_APP . "/Cliente/alterar/" . $cliente->getIdCliente();
	        			$urlExcluir = SH_WEB_ROOT_APP . "/Cliente/excluir/" . $cliente->getIdCliente();
	        	?>
			          <tr class="<?php echo $cliente->getStatus()=="I" ? "danger" : "" ?>">
			            <td class="text-center"><?php echo $cliente->getIdCliente() ?></td>
			            <td><?php echo $cliente->getNome() ?></td>
			            <td class="hidden-xs"><?php echo $cliente->getEstado() ?></td>
			            <td class="hidden-xs"><?php echo $cliente->getCidade() ?></td>
			            <td class="hidden-xs"><?php echo $cliente->getCpf() ?></td>				            
			            <td class="text-right" nowrap>
			            	<a href="<?php echo $urlAlterar?>" class="btn btn-warning btn-xs" title="Alterar"><i class="glyphicon glyphicon-edit"></i> </a>				            	
			            	<button type="button" class="btn btn-danger btn-xs" title="Excluir" onclick="if(confirm('Deseja remover o cliente?')) { document.location.href='<?php echo $urlExcluir?>' }"><i class="glyphicon glyphicon-trash"></i> </button>								
			            </td>
			          </tr>
	          <?php
	          		}
	          ?>
	          
	        </tbody>
	      </table>		      
	      </div>

	      <?php
				if(count($this->clientes) == 0)
          		{
          			$alert = new Alert("ATENÇÃO:","Nenhum registro encontrado!",Alert::$INFO);
					echo $alert->getHtml();
          		}
	      ?>

	      <hr>

	      <div class="text-center">
	      	<?php
	      		$pagination = new Pagination(SH_WEB_ROOT_APP."/Cliente/listar",$this->clientes,$REG_PG,$NUM_PG);
	      		echo $pagination->getHtml();
	      	?>      				    
		</div>
		
		
	
  
<?php  
  $this->setView("Footer");
?>  