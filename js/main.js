$(document).ready(function(e) {
	$('#aReceber').click(function(e) {
		$('#aPagarForm').hide();
		$('#aReceberForm').show();
		$('#aReceber').addClass('ativo');
		$('#aPagar').removeClass('ativo');
	});
	$('#aPagar').click(function(e) {
		$('#aPagarForm').show();
		$('#aReceberForm').hide();
		$('#aReceber').removeClass('ativo');
		$('#aPagar').addClass('ativo');
	});
	$('#ano_selected').click(function(e) {
		e.preventDefault();
		if($('#content_select_ano ul').is(':visible')){
			$('#content_select_ano ul').hide();
			$('#ano_selected').removeClass('listaAtiva');
		} else {
			$('#content_select_ano ul').show();
			$('#ano_selected').addClass('listaAtiva');
		}
	});
	$('#lista_movimento .btn_editar').click(function(e) {
		e.preventDefault();
		if($(this).parent().find('form').is(':visible')){
			$(this).parent().find('form').slideUp();
		} else {
			$('#lista_movimento .form_editar').slideUp();
			$(this).parent().find('form').slideDown();
		}
	});
	if($('.mensagem').length > 0){
		$('.mensagem').animate({top:0}, function(){
			setTimeout(function(){
				$('.mensagem').animate({top:-53});
			}, 5000);
		});
	}
	$('#lista_categorias a.btn_editar').click(function(e) {
		$('#lista_categorias').find('.editar_categoria').hide();
		$('#lista_categorias').find('.nome').show();
		if($(this).parent().find('.editar_categoria').is(':visible')){
			$(this).parent().find('.editar_categoria').hide();
			$(this).parent().find('.nome').show();
		} else {
			$(this).parent().find('.editar_categoria').show();
			$(this).parent().find('.nome').hide();
		}
	});
	$("#bodyAddMovimento #calendarioInput").datepicker({
        changeMonth: true,
        changeYear: true
    });
	$('#calendario_btn').click(function(e) {
		$( "#bodyAddMovimento #calendarioInput" ).datepicker("show");
	});
	
	$('input.data_pagamento').datepicker({
        changeMonth: true,
        changeYear: true
    });
	$('#cadastrar_conta .calendario_ico').click(function(e) {
		$(this).next().datepicker("show");
	});
	
	$('#ger_contas .btn_pago').click(function(e) {
		e.preventDefault();
		$(this).parent().find('form.formPagaConta').submit();
	});
	
	$('#filtrosContas select').change(function(e) {
		$('#filtrosContas').submit();
	});
	
	if(getParameter('ordenar_por') !== undefined){
		$('#filtrosContas select[name="ordenar_por"] option[value="'+getParameter('ordenar_por')+'"]').prop('selected', true);
	}
	if(getParameter('filtrar_por') !== undefined){
		$('#filtrosContas select[name="filtrar_por"] option[value="'+getParameter('filtrar_por')+'"]').prop('selected', true);
	}
	if(getParameter('busca') !== undefined){
		$('#filtrosContas #text_buscar').val(getParameter('busca'));
	}
	
	if(getParameter('por') != ''){
		$('#filtro_mes select option[value="'+getParameter('por')+'"]').attr('selected', 'selected');
	}
	$('#filtro_mes input, #filtro_mes select').change(function(e) {
		$('#filtro_mes').submit();
	});
	$('#filtro_mes input').datepicker({
        changeMonth: true,
        changeYear: true
    });
	$('#bodyRelatorios #btnDataInicio').click(function(e) {
		e.preventDefault();
		$('#filtro_mes input[name="dataInicio"]').datepicker("show");
	});
	$('#bodyRelatorios #btnDataFinal').click(function(e) {
		e.preventDefault();
		$('#filtro_mes input[name="dataFim"]').datepicker("show");
	});
	/*Usuários*/
	$('#ger_usuarios .excluir_btn').click(function(e) {
		if(!confirm('Deseja realmente excluir esse usuário?')){
			return false;
		}
	});
});

function getParameter(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    if (pair[0] == variable) {
      return pair[1];
    }
  } 
}