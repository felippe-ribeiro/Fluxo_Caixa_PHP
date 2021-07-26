<div class="col_esq">
	<img id="logoSistema" src="img/all/logo_caixa.png" alt="Livro Caixa" width="156" height="40">
	<ul id="menuPrincipal">
		<li><a href="principal.php" <?= $ativar == 'menu_icon_fluxo' ? 'class="ativo"':''?>><span id="menu_icon_fluxo" class="btn_menu_principal "></span>Fluxo</a></li>
		<?php if($_SESSION['tipo'] == 'administrador' || 'supadm'){ ?>
		<li><a href="contas.php" <?= $ativar == 'menu_icon_contas' ? 'class="ativo"':''?>><span id="menu_icon_contas" class="btn_menu_principal"></span>Contas</a></li>
		<?php } ?>
		<li><a href="relatorios.php" <?= $ativar == 'menu_icon_relatorios' ? 'class="ativo"':''?>><span id="menu_icon_relatorios" class="btn_menu_principal"></span>Relatórios</a></li>
		<?php if($_SESSION['tipo'] == 'supadm'){ ?>
		<li><a href="usuarios.php" <?= $ativar == 'menu_icon_usuarios' ? 'class="ativo"':''?>><span id="menu_icon_usuarios" class="btn_menu_principal"></span>Usuários</a></li>
		<?php } ?>
	</ul>
</div>