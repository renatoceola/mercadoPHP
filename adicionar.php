<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Novo Produto </h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="descricao" id="descricao">
                <label for="descricao">Descrição</label>
            </div>
            <div class="input-field col s12">
                <input type="number" name="preco" id="preco">
                <label for="preco">Preço</label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
            <a href="lista_produtos.php" class="btn"> Lista Produtos </a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>