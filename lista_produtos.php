<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Produtos </h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Código:</th>
                    <th>Descrição:</th>
                    <th>Preço:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM produto";
                $resultado = mysqli_query($connect, $sql);
                while ($dados = mysqli_fetch_array($resultado)) :
                ?>
                    <tr>
                        <td><?php echo $dados['Codigo']; ?></td>
                        <td><?php echo $dados['Descricao']; ?></td>
                        <td><?php echo $dados['Preco']; ?></td>
                    </tr>
                <?php endwhile;  ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar Produto</a>
        <a href="index.php" class="btn">Venda</a>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>