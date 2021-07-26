<?php
if (isset($_GET['cat_err']) && $_GET['cat_err']==1){
?>

<div class="mensagem erro">
<strong>Esta categoria nao pode ser removida, pois há movimentos associados a ela</strong>
</div>

<?php }?>

    <?php
if (isset($_GET['cat_ok']) && $_GET['cat_ok']==2){
?>

<div class="mensagem sucesso">
<strong>Categoria removida com sucesso!</strong>
</div>

<?php }?>
    
<?php
if (isset($_GET['cat_ok']) && $_GET['cat_ok']==1){
?>

<div class="mensagem sucesso">
<strong>Categoria Cadastrada com sucesso!</strong>
</div>

<?php }?>
    
    <?php
if (isset($_GET['cat_ok']) && $_GET['cat_ok']==3){
?>

<div class="mensagem sucesso">
<strong>Categoria alterada com sucesso!</strong>
</div>

<?php }?>

<?php
if (isset($_GET['ok']) && $_GET['ok']==1){
?>

<div class="mensagem sucesso">
<strong>Movimento Cadastrado com sucesso!</strong>
</div>

<?php }?>

<?php
if (isset($_GET['ok']) && $_GET['ok']==2){
?>

<div class="mensagem sucesso">
<strong>Movimento removido com sucesso!</strong>
</div>

<?php }?>
    
<?php
if (isset($_GET['ok']) && $_GET['ok']==3){
?>

<div class="mensagem sucesso">
<strong>Movimento alterado com sucesso!</strong>
</div>

<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='conta_cadastrada'){ ?>
<div class="mensagem sucesso">
<strong>Conta cadastrada com sucesso!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='conta_paga'){?>
<div class="mensagem sucesso">
<strong>Conta paga!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='conta_apagada'){ ?>
<div class="mensagem sucesso">
<strong>Conta removida!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='usuario_cadastrado'){ ?>
<div class="mensagem sucesso">
<strong>Usuário cadastrado!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='usuario_atualizado'){ ?>
<div class="mensagem sucesso">
<strong>Usuário atualizado!</strong>
</div>
<?php }?>

<?php if (isset($_GET['erro']) && $_GET['erro']=='erro_usuario'){ ?>
<div class="mensagem erro">
<strong>Não foi possível cadastrar usuário! Preencha todos os campos e digite um email que não foi utilizado por outro usuário</strong>
</div>
<?php }?>

<?php if (isset($_GET['erro']) && $_GET['erro']=='erro_excluir'){?>
<div class="mensagem erro">
<strong>Erro ao tentar excluir usuário</strong>
</div>
<?php }?>

<?php if (isset($_GET['erro']) && $_GET['erro']=='mesmo_usuario'){?>
<div class="mensagem erro">
<strong>Você não pode excluir o seu próprio usuário</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='usuario_excluido'){?>
<div class="mensagem sucesso">
<strong>Usuário excluído</strong>
</div>

<?php }?>
