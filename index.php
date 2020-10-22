<?php
include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <?php
        $sql = "SELECT * FROM documento where confirmado = 0 order by numero desc LIMIT 1";
        $resultado = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_row($resultado);
        $venda = "--";
        if ($dados != null) :
            $venda = $dados[0];
        endif;
        ?>
        <h4><?php echo "Venda atual: $venda"; ?></h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="input-field col s12">
                <label for="procurar">Procurar produto</label>
                <input type="text" id="procurar" class="procurar" name="procurar">
                <input type="submit" name="btn-procurar" class="btn" value="procurar"></button>
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
                        $procurar = filter_input(INPUT_GET, "procurar");
                        if ($procurar) :
                            $encontrado = false;
                            $sql = "SELECT * FROM produto where codigo = $procurar";
                            $resultado = mysqli_query($connect, $sql);
                            while ($resultado != null && $dados = mysqli_fetch_array($resultado)) : ?>
                                <tr>
                                    <?php $encontrado = true; ?>
                                    <td><?php echo $dados[0]; ?></td>
                                    <td><?php echo $dados[1]; ?></td>
                                    <td><?php echo $dados[2]; ?></td>
                                    <td><a href="php_action/add_product.php?documento=<?php echo $venda; ?>&&produto=<?php echo $dados[0]; ?>" class="btn-floating green"><i class="material-icons">add</i></a></td>
                                </tr>
                            <?php
                            endwhile;
                            if (!$encontrado) : ?>
                                <tr>
                                    <td>Produto não cadastrado</td>
                                </tr>
                        <?php endif;
                        endif; ?>
                    </tbody>
                </table>
            </div>
            </table>
        </form>
        <form action="php_action/buy.php" method="POST">
            <h4>Lista Compras</h4>
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

                    $sql = "SELECT * FROM item where documento = $venda";
                    $resultado = mysqli_query($connect, $sql);
                    $valor_total = 0;
                    while ($resultado != null && $dados = mysqli_fetch_array($resultado)) :
                        $codigo_produto = $dados[1];
                        $sql = "SELECT * FROM produto where codigo = $codigo_produto";
                        $resultado_produto = mysqli_query($connect, $sql);
                        $dados_produto = mysqli_fetch_row($resultado_produto);
                        $valor_total = $valor_total + $dados_produto[2];
                    ?>
                        <tr>
                            <td><?php echo $dados_produto[0]; ?></td>
                            <td><?php echo $dados_produto[1]; ?></td>
                            <td><?php echo $dados_produto[2]; ?></td>
                        </tr>
                    <?php endwhile;  ?>
                </tbody>
            </table>
            <br>
            <br>
            <label for="total">Total</label>
            <input type="number" name="total" id="total" readonly="true" value="<?php echo $valor_total ?>">
            <?php $sql = "SELECT SUM(total) FROM documento where confirmado = 1";
            $resultado = mysqli_query($connect, $sql);
            $valor_total_dia = mysqli_fetch_row($resultado)[0]; ?>
            <label for="total">Total Dia</label>
            <input type="number" name="total_dia" id="total_dia" readonly="true" value="<?php echo $valor_total_dia ?>">
            <?php if (!is_numeric($venda)) : ?>
            <button type="submit" name="btn-criar-venda" class="btn blue">Nova Venda</button>
            <?php else : ?>
            <button type="submit" name="btn-finalizar-venda" class="btn green">Finalizar Venda</button>
            <?php endif; ?>
            <a href="lista_produtos.php" class="btn orange">Lista Produtos</a>
        </form>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>