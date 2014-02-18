<?php
  $this->setView("Header");
?>
	
	<form id="form" name='form' action="<?php echo SH_WEB_ROOT_APP ?>/Cliente/salvar" method="POST">  	  

	   <h3><i class="glyphicon glyphicon-pencil"></i> Cadastro de cliente</h3>
		<hr>

		 <div class="row">
		 	<div class="form-group col-lg-2 col-sm-2">
		      <label for="idCliente">Código</label>
		      <input type="text" name="idCliente" id="idCliente" value="<?php echo $this->cliente->getIdCliente();?>" readonly="readonly" class="form-control" placeholder="AUTO">
		    </div>
		    <div class="form-group col-lg-5 col-sm-5">
		      <label for="nome">Nome</label>
		      <input type="text" name="nome" id="nome" value="<?php echo $this->cliente->getNome();?>" class="form-control" placeholder="Nome Completo"		      	
			      data-required="true"
			      data-pattern="^[0-9]+$"
			      data-description-required="O campo NOME é obrigatório!"			      
			      data-description-pattern="Campo pattern"
		      >
		    </div>
		    <div class="form-group col-lg-5 col-sm-5">
		      <label for="email">Email</label>
				<div class="input-group">						
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>						
					<input type="email" name="email" id="email" value="<?php echo $this->cliente->getEmail();?>" class="form-control" placeholder="examplo@dominio.com.br"						
						data-required="true"
					    data-description-required="O campo EMAIL é obrigatório!"
					    data-pattern="\b[A-Z0-9._%+-]+@(?:[A-Z0-9-]+\.)+[A-Z]{2,4}\b"
					    data-description-pattern="Preencha o EMAIL corretamente!"
					>
				</div>
		    </div>		   
		 </div>

		 <div class="row">
		    <div class="form-group col-lg-3 col-sm-3">
		      <label for="exampleInputEmail">CPF</label>
		      <input type="text" name="cpf" value="<?php echo $this->cliente->getCpf();?>" class="form-control maskCpf" id="cpf" placeholder="Número do CPF"
					data-required="true"					
					data-description-required="O campo CPF é obrigatório!"
					data-pattern="^([0-9]){3}\.([0-9]){3}\.([0-9]){3}-([0-9]){2}$"
					data-description-pattern="O CPF deve conter 11 números!"
					data-conditional="cpf"
					data-description-conditional="Digite um CPF válido!"
				>
		    </div>
		    <div class="form-group col-lg-3 col-sm-3">
		      	<label for="rg">RG</label>			      
				<input type="text" name="rg" id="rg" value="<?php echo $this->cliente->getRg();?>" class="form-control" placeholder="R.G."
					data-required="true" data-description-required="O campo RG é obrigatório!">
		    </div>		   
		    <div class="form-group col-lg-3 col-sm-3">
		      	<label for="dataExpedicao">Data de expedição</label>			      
				<input type="date" name="dataExpedicao" id="dataExpedicao" value="<?php echo $this->cliente->getDataExpedicao();?>" class="form-control" 
					data-required="true" 
					data-description-required="O campo DATA DE EXPEDIÇÃO é obrigatório!">
					<!--data-pattern="^[0-9]{2}/[0-9]{2}/[0-9]{4}$"
					data-description-pattern="Digite uma DATA válida!"-->
		    </div>		   
		    <div class="form-group col-lg-3 col-sm-3">
		      	<label for="orgaoEmissor">Orgão Emissor</label>			      
				<input type="text" name="orgaoEmissor" id="orgaoEmissor" value="<?php echo $this->cliente->getOrgaoEmissor();?>" class="form-control" placeholder="Orgão Emissor"
					data-required="true" data-description-required="O campo ORGÃO EMISSOR é obrigatório!">
		    </div>		   
		 </div>

		 <div class="row">
		 	<div class="form-group col-lg-2 col-sm-2">
		      <label for="dataNascimento">Data Nascimento</label>      						
			  <input type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $this->cliente->getDataNascimento();?>" class="form-control">
		    </div>	
		 	<div class="form-group col-lg-2 col-sm-2">
		      <label for="cep">CEP</label>
		      <input type="text" name="cep" id="cep" value="<?php echo $this->cliente->getCep();?>" class="form-control maskCep" placeholder="CEP"		      		
					data-required="true"
					data-description-required="O campo CEP é obrigatório!"
					data-pattern="^[0-9]{5}-[0-9]{3}$"
					data-description-pattern="Digite um CEP válido!"
		      >
		    </div>
		    <div class="form-group col-lg-6 col-sm-6">
		      <label for="logradouro">Logradouro</label>
		      <input type="text" name="logradouro" id="logradouro" value="<?php echo $this->cliente->getLogradouro();?>" class="form-control" placeholder="Logradouro">
		    </div>
		    <div class="form-group col-lg-2 col-sm-2">
		      <label for="numero">Número</label>
		      <input type="text" name="numero" id="numero" value="<?php echo $this->cliente->getNumero();?>" class="form-control" placeholder="Número">
		    </div>
		 </div>

		 <div class="row">
		    <div class="form-group col-lg-6 col-sm-6">
		      <label for="complemento">Complemento</label>
		      <input type="text" name="complemento" id="complemento" value="<?php echo $this->cliente->getComplemento();?>"  class="form-control" placeholder="Complemento">
		    </div>
		    <div class="form-group col-lg-6 col-sm-6">
		      <label for="bairro">Bairro</label>
		      <input type="text" name="bairro" value="<?php echo $this->cliente->getBairro();?>" id="bairro" class="form-control" placeholder="Bairro">
		    </div>
		 </div>

		 <div class="row">
		    <div class="form-group col-lg-4 col-sm-4">
		      <label for="estado">Estado</label>
		      <select name="estado" id="estado" class="form-control">
		      	<option></option>
			      <?php
			      	if(is_array(Util::$estados))
			      	{
				      	foreach (Util::$estados as $estado => $nome) 
				      	{
				      		$selected = $estado == $this->cliente->getEstado() ? "selected" : "";
				      		echo "<option value='{$estado}' {$selected}>{$nome}</option>";
				      	}			      	
				    }
			      ?>		      			      	
		      </select>
		    </div>
		    <div class="form-group col-lg-8 col-sm-8">
		      <label for="cidade">Cidade</label>
		      <input type="text" name="cidade" id="cidade" value="<?php echo $this->cliente->getCidade();?>" class="form-control" placeholder="Cidade">
		    </div>
		 </div>

		 <div class="row">
		    <div class="form-group col-lg-6 col-sm-6">
		      <label for="telefone">Telefone</label>
		      	<div class="input-group">						
					<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>						
					<input type="text" name="telefone" id="telefone" value="<?php echo $this->cliente->getTelefone();?>" class="form-control maskTelefone" placeholder="(99)9999-9999">						
				</div>
		    </div>
		    <div class="form-group col-lg-6 col-sm-6">
		      <label for="celular">Celular</label>
		      <div class="input-group">						
				<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>						
				<input type="text" name="celular" value="<?php echo $this->cliente->getCelular();?>" class="form-control maskTelefone" placeholder="(99)9999-9999">						
			</div>
		    </div>
		</div>

		<div class="row">
		    <div class="form-group col-lg-12 col-sm-12">
		      <label for="status">Status</label>
		      	<div class="input-group">						
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary btn-sm <?php echo $this->cliente->getStatus()=="A" ? "active" : ""; ?>">
				    <input type="radio" name="status" id="ativo" value="A" <?php echo $this->cliente->getStatus()=="A" ? "checked" : ""; ?>> Ativo
				  </label>
				  <label class="btn btn-primary btn-sm <?php echo $this->cliente->getStatus()=="I" ? "active" : ""; ?>">
				    <input type="radio" name="status" id="inativo" value="I" <?php echo $this->cliente->getStatus()=="I" ? "checked" : ""; ?>> Inativo
				  </label>				 
				</div>

				</div>
		    </div>		    
		</div>

		<div class="row pull-right">
			<div class="form-group col-lg-12 col-sm-12">
				<button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
		    	<a href="<?php echo SH_WEB_ROOT_APP ?>/Cliente/listar" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
			</div>
		</div>
	</form>



	<script type="text/javascript">	
		
		/*
		$('form').validate({
			
			//onChange : true,
			onKeyup : true,
			eachValidField : function() {
				$(this).closest('div').removeClass('has-error').addClass('has-success');
				$(this).popover("hide");
			},
			eachInvalidField : function(element, event, status) {
				
				$(this).closest('div').removeClass('has-success').addClass('has-error');

				var message = "";

				switch(false)
				{
					case event.required:
						message = $(this).attr("data-description-required");
					break;

					case event.pattern:
						message = $(this).attr("data-description-pattern");
					break;

					case event.conditional:
						message = $(this).attr("data-description-conditional");
					break;
				}

				if(message.length > 0)
				{					
					
					$(this).attr("data-toggle","popover");
					$(this).attr("data-placement","top");
					$(this).attr("data-content",message);
					$(this).popover("show");


					//$(this).attr("data-content",message);
					//$(this).popover({
					//	toggle 		: "popover",
					//	placement  	: "top"
					//}).popover("show");					
					
				}
			},
			conditional : {
				cpf : function(value) {
					return $.validarCPF(value);
				}
			}
		});
		*/

		/*
		jQuery.validateExtend({
		    cpf : {
		        required : true,		        
		        conditional : function(value) {
		            return false;
		        }
		    }
		});*/


		
		


	</script>
  
<?php
  $this->setView("Footer");
?>  