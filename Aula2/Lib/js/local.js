
	$(document).ready(function() {
		
		$('.maskTelefone').focusout(function(){
		    var phone, element;
		    element = $(this);
		    element.unmask();
		    phone = element.val().replace(/\D/g, '');
		    if(phone.length > 10) {
		        element.mask("(99) 99999-999?9");
		    } else {
		        element.mask("(99) 9999-9999?9");
		    }
		}).trigger('focusout');

		
		$(".maskCep").mask("99999-999");

		$(".maskCpf").mask("999.999.999-99");			

		$(".maskCnpj").mask("99.999.999/9999-99");		

	});

	jQuery.validarCPF = function(cpf) {
        cpf = cpf.replace(/[^\d]+/g,'');
     
        if(cpf == '' || cpf.length != 11)
            return false;
         
        // Valida primeiro digito
        add = 0;
        for (i=0; i < 9; i ++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
 
        if (rev == 10 || rev == 11)
            rev = 0;
 
        if (rev != parseInt(cpf.charAt(9)))
            return false;
         
        // Valida segundo digito
        add = 0;
        for (i = 0; i < 10; i ++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
 
        rev = 11 - (add % 11);
 
        if (rev == 10 || rev == 11)
            rev = 0;
 
        if (rev != parseInt(cpf.charAt(10)))
            return false;
 
        return true;
    };