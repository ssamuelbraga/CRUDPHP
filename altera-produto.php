<?php include("cabecalho.php");
include("conexao-banco.php");
include("banco-categoria.php");
include("banco-produto.php");

    $id=$_GET['id'];
    $produto = buscaProduto($conexao, $id);
    $categorias= listaCategorias($conexao);
    $usado = $produto['usado'] ? "checked='checked'" : "";
?>

    <h1>Alterar Produto</h1>
        <form action="produto-alterado.php" method="POST">
            <input type="hidden" name="id" value="<?=$produto['id']?>">
            <table class="table">
                <tr>
                    <td>Nome:</td> 
                    <td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
                </tr>
                <tr>
                    <td>Preço:</td>
                    <td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"></td>
                 </tr>
                <tr>
                    <td>Descrição: </td>
                    <td> <textarea name="descricao" id="" cols="30" rows="10" class="form-control"><?=$produto['descricao']?></textarea></td> 
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="usado" value="1" <?=$usado ?>> Usado</td>
                </tr>
                <tr>
                    <td>Categoria</td>
                    <td>
                        <select name="categoria_id" class="form-control">
                    <!--Busca automaticamente as categorias cadastradas no banco-->
                    <?php foreach($categorias as $categoria) : 
                        $essaCategoria = $produto['categoria_id'] == $categoria['id'];
                        $selecao = $essaCategoria ? "selected='selected'" : "";
                        ?>
                        <option value="<?=$categoria['id']?>" <?= $selecao ?>> <?=$categoria['nome']?> </option>   <!--value é o que passa para a pagina do form-->
                        <?php endforeach ?>
                        </select>
                </tr>
                <tr>
                    <td> <input class="btn btn-primary" type="submit" value="Confirmar"></td> 
                </tr>
           </table>
        </form>
<?php include("rodape.php")?>