$(document).ready(function(){

    /** NAV BAR **/
	$('#contentproduto').hide();
	$('#contentcliente').hide();
	$('#contentpedido').hide();
	var pagina = "#contenthome";

    $("#home").click(function() {
  		$(pagina).hide();
  		$('#contenthome').show();
  		pagina = '#contenthome';
	});
	/** NAV BAR **/

	/** PRODUTO **/

	/** SELECT **/
	$("#produto").click(function() {
		
		$.ajax({                                      
      		url: 'produto.php',                  
      		type: 'POST',         
      		data: {action: 'select'},            
      		dataType: 'json',                	
      		success: function(data)          	
      	{

			$("#table-produto thead").remove();
			$("#table-produto tr").remove();
       		$('#table-produto').append('<thead><tr><th>#</th><th>Nome</th><th>Descricao</th><th>Preco</th><th>Actions</th></tr></thead><tbody>'); 
       		if(!$.trim(data)){  
                $('#table-produto').append('<tr><td>Sem Produtos para listar</td></tr>');
       		} else {
      			$.each(data, function (i, item) {
				 $('#table-produto').append('<tr><td>' + item.id + '</td><td>' + item.nome + '</td><td>' + item.descricao + '</td><td>' + item.preco + '</td><td><button type="button" data="' + item.id + '" class="btn btn-xs btn-info btn-edit-produto">Editar</button><button type="button" data="' + item.id + '" class="btn btn-xs btn-danger btn-remove-produto">Deletar</button></td></tr>');
      			});
      		}
      		$('#table-produto').append('</tbody>');
        	

      	}	 
    	});
    	$(pagina).hide();
		$('#contentproduto').show(); 	
		pagina = '#contentproduto'; 	
	});
	/** SELECT **/

    /** CREATE / UPDATE **/
	$("#criar-produto").click(function() {
		$('#modal-produto').modal('show');
		$('#action-produto').val('insert');
	});

    $("#save-produto").click(function() {
    	var nome = $('#produto-nome').val();
    	var descricao = $('#produto-descricao').val();
    	var preco = $('#produto-preco').val();
    	var action = $('#action-produto').val();
    	$.ajax({                                      
      		url: 'produto.php',                  
      		type: 'POST',         
      		data: {action: action, nome: nome, descricao: descricao, preco: preco },             
                                       			
      		dataType: 'json',                	
      		success: function(data)          	
      		{
      			    	$('#modal-produto').modal('hide'); 
    					$("#produto").click();	
      		}	 
    	});

    });

    $('#modal-produto').on('hidden.bs.modal', function () {
    	$('#produto-nome').val('');
        $('#produto-descricao').val('');
      	$('#produto-preco').val('');
	});

    $(document).on("click", ".btn-edit-produto", function () {

		$.ajax({                                      
      		url: 'produto.php',                  
      		type: 'POST',         
      		data: {action: 'select', id: $(this).attr('data')},     
                                       			
      		dataType: 'json',                	
      		success: function(data)          	
      	{
      		$.each(data, function (i, item) {
      			$('#produto-nome').val(item.nome);
        		$('#produto-descricao').val(item.descricao);
      			$('#produto-preco').val(item.preco);
      		});
      		
      	}

		});

		$('#action-produto').val($(this).attr('data'));
		$('#modal-produto').modal('show'); 


	});
	/** CREATE / UPDATE **/

    /** DELETE **/
	$(document).on("click", ".btn-remove-produto", function () {
		$('#action-produto-remove').val($(this).attr('data'));
		$('#modal-produto-delete').modal('show'); 
	});	

	$('#modal-produto-delete').on('hidden.bs.modal', function () {
      	$('#action-produto-remove').val('');
      	$('#p-delete-produto').text('Tem certeza que voce deseja deletar esse produto?');
      	$('#p-delete-produto').removeClass('label-danger');
	});

	$("#delete-produto").click(function() {
    	var id = $('#action-produto-remove').val();
    	var action = 'delete';
    	$.ajax({                                      
      		url: 'produto.php',                  
      		type: 'POST',         
      		data: {action: action, id: id},             
                                       			
      		dataType: 'json',                	
      		success: function(data)          	
      		{
      			if(!$.trim(data)){ 
      				$('#p-delete-produto').text('Nao foi possivel deletar, verifque se esse produto esta em um pedido.');
      				$('#p-delete-produto').addClass('label-danger');
      			} else {
      			    $('#modal-produto-delete').modal('hide');	
    				$("#produto").click();
    			}
      		}	 
    	});

    });
    /** DELETE **/

    /** PRODUTO **/

    /** CLIENTE **/

	/** SELECT **/
	$("#cliente").click(function() {
		
		$.ajax({                                      
      		url: 'cliente.php',                  
      		type: 'POST',         
      		data: {action: 'select'},            
      		dataType: 'json',                	
      		success: function(data)          	
      	{

			$("#table-cliente thead").remove();
			$("#table-cliente tr").remove();
       		$('#table-cliente').append('<thead><tr><th>#</th><th>Nome</th><th>EMAIL</th><th>Telefone</th><th>Actions</th></tr></thead><tbody>'); 
       		if(!$.trim(data)){  
                $('#table-cliente').append('<tr><td>Sem Clientes para listar</td></tr>');
       		} else {
      			$.each(data, function (i, item) {
				 $('#table-cliente').append('<tr><td>' + item.id + '</td><td>' + item.nome + '</td><td>' + item.email + '</td><td>' + item.telefone + '</td><td><button type="button" data="' + item.id + '" class="btn btn-xs btn-info btn-edit-cliente">Editar</button><button type="button" data="' + item.id + '" class="btn btn-xs btn-danger btn-remove-cliente">Deletar</button></td></tr>');
      			});
      		}
      		$('#table-cliente').append('</tbody>');
        	

      	}	 
    	});
    	$(pagina).hide();
		$('#contentcliente').show(); 	
		pagina = '#contentcliente'; 	
	});
	/** SELECT **/

    /** CREATE / UPDATE **/
	$("#criar-cliente").click(function() {
		$('#modal-cliente').modal('show');
		$('#action-cliente').val('insert');
	});

    $("#save-cliente").click(function() {
    	var nome = $('#cliente-nome').val();
    	var email = $('#cliente-email').val();
    	var telefone = $('#cliente-telefone').val();
    	var action = $('#action-cliente').val();
    	$.ajax({                                      
      		url: 'cliente.php',                  
      		type: 'POST',         
      		data: {action: action, nome: nome, email: email, telefone: telefone },             
                                       			
      		dataType: 'json',                	
      		success: function(data)          	
      		{
      			    	$('#modal-cliente').modal('hide'); 
    					$("#cliente").click();	
      		}	 
    	});

    });

    $('#modal-cliente').on('hidden.bs.modal', function () {
    	$('#cliente-nome').val('');
        $('#cliente-email').val('');
      	$('#cliente-telefone').val('');
	});

    $(document).on("click", ".btn-edit-cliente", function () {

		$.ajax({                                      
      		url: 'cliente.php',                  
      		type: 'POST',         
      		data: {action: 'select', id: $(this).attr('data')},     
                                       			
      		dataType: 'json',                	
      		success: function(data)          	
      	{
      		$.each(data, function (i, item) {
      			$('#cliente-nome').val(item.nome);
        		$('#cliente-email').val(item.email);
      			$('#cliente-telefone').val(item.telefone);
      		});
      		
      	}

		});

		$('#action-cliente').val($(this).attr('data'));
		$('#modal-cliente').modal('show'); 


	});
	/** CREATE / UPDATE **/

    /** DELETE **/
	$(document).on("click", ".btn-remove-cliente", function () {
		$('#action-cliente-remove').val($(this).attr('data'));
		$('#modal-cliente-delete').modal('show'); 
	});	

	$('#modal-cliente-delete').on('hidden.bs.modal', function () {
      	$('#action-cliente-remove').val('');
      	$('#p-delete-cliente').text('Tem certeza que voce deseja deletar esse cliente?');
      	$('#p-delete-cliente').removeClass('label-danger');
	});

	$("#delete-cliente").click(function() {
    	var id = $('#action-cliente-remove').val();
    	var action = 'delete';
    	$.ajax({                                      
      		url: 'cliente.php',                  
      		type: 'POST',         
      		data: {action: action, id: id},             
                                       			
      		dataType: 'json',                	
      		success: function(data)          	
      		{
      			if(!$.trim(data)){ 
      				$('#p-delete-cliente').text('Nao foi possivel deletar, verifque se esse cliente tem um pedido.');
      				$('#p-delete-cliente').addClass('label-danger');
      			} else {
      			    $('#modal-cliente-delete').modal('hide');	
    				$("#cliente").click();
    			} 
      		}	 
    	});

    });
    /** DELETE **/

    /** CLIENTE **/

    /** PEDIDO **/

	/** SELECT **/
	$("#pedido").click(function() {
		
		$.ajax({                                      
      		url: 'pedido.php',                  
      		type: 'POST',         
      		data: {action: 'select'},            
      		dataType: 'json',                	
      		success: function(data)          	
      	{

			$("#table-pedido thead").remove();
			$("#table-pedido tr").remove();
       		$('#table-pedido').append('<thead><tr><th>Cliente</th><th>Produto</th><th>Actions</th></tr></thead><tbody>'); 
       		if(!$.trim(data)){  
                $('#table-pedido').append('<tr><td>Sem Pedidos para listar</td></tr>');
       		} else {
      			$.each(data, function (i, item) {
				 $('#table-pedido').append('<tr><td>' + item.cliente + '</td><td>' + item.produto + '</td><td><button type="button" data-produto="' + item.id_produto + '" data-cliente="' + item.id_cliente + '" class="btn btn-xs btn-danger btn-remove-pedido">Deletar</button></td></tr>');
      			});
      		}
      		$('#table-pedido').append('</tbody>');
        	

      	}	 
    	});
    	$(pagina).hide();
		$('#contentpedido').show(); 	
		pagina = '#contentpedido'; 	
	});
	/** SELECT **/

	/** CREATE **/
	$("#criar-pedido").click(function() {
		$.ajax({                                      
      		url: 'cliente.php',                  
      		type: 'POST',         
      		data: {action: 'select'},                              			
      		dataType: 'json',                	
      		success: function(data)          	
      	{
      		if(!$.trim(data)){  
      				$('#pedido-cliente').append('<option value="0">Sem Clientes</option>');
      		} else {
      			$("#pedido-cliente option").remove();
      			$.each(data, function (i, item) {
      				$('#pedido-cliente').append('<option value="' + item.id + '">' + item.nome + '</option>');
      			});
      		}
      		
      	}

		});
		$.ajax({                                      
      		url: 'produto.php',                  
      		type: 'POST',         
      		data: {action: 'select'},                              			
      		dataType: 'json',                	
      		success: function(data)          	
      	{
      		if(!$.trim(data)){  
      				$('#pedido-produto').append('<option value="0">Sem Produtos</option>');
      		} else {
      			$("#pedido-produto option").remove();
      			$.each(data, function (i, item) {
      				$('#pedido-produto').append('<option value="' + item.id + '">' + item.nome + '</option>');
      			});
      		}
      		
      	}

		});
		$('#modal-pedido').modal('show');

	});

    $("#save-pedido").click(function() {
    	var cliente = $('#pedido-cliente').val();
    	var produto = $('#pedido-produto').val();
    	$.ajax({                                      
      		url: 'pedido.php',                  
      		type: 'POST',         
      		data: {action: 'insert', cliente: cliente, produto: produto },             
                                       			
      		dataType: 'json',                	
      		success: function(data)          	
      		{
      			    	$('#modal-pedido').modal('hide'); 
    					$("#pedido").click();	
      		}	 
    	});

    });
	/** CREATE **/

	/** DELETE **/
	$(document).on("click", ".btn-remove-pedido", function () {
		$('#action-pedido-cliente').val($(this).attr('data-cliente'));
		$('#action-pedido-produto').val($(this).attr('data-produto'));
		$('#modal-pedido-delete').modal('show'); 
	});	


	$("#delete-pedido").click(function() {
    	var cliente = $('#action-pedido-cliente').val();
    	var produto = $('#action-pedido-produto').val();
    	var action = 'delete';
    	$.ajax({                                      
      		url: 'pedido.php',                  
      		type: 'POST',         
      		data: {action: action, cliente: cliente, produto: produto},             
      		dataType: 'json',                	
      		success: function(data)          	
      		{
      			    	$('#modal-pedido-delete').modal('hide');	
    					$("#pedido").click();
      		}	 
    	});

    });
    /** DELETE **/

	/** PEDIDO **/

});