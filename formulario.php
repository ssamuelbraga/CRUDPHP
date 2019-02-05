<?php include("cabecalho.php");
include("conexao-banco.php");
include("banco-categoria.php");

    $categorias= listaCategorias($conexao);
?>

    <h1>Formulário de Cadastro</h1>
        <form action="adiciona-produto.php" method="POST">
            <table class="table">
                <tr>
                    <td>Nome:</td> 
                    <td><input class="form-control" type="text" name="nome"></td>
                </tr>
                <tr>
                    <td>Preço:</td>
                    <td><input class="form-control" type="number" name="preco"></td>
                 </tr>
                <tr>
                    <td>Descrição: </td>
                    <td> <textarea name="descricao" id="" cols="30" rows="10" class="form-control"></textarea></td> 
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" name="usado" value="1"> Usado</td>
                </tr>
                <tr>
                    <td>Categoria</td>
                    <td>
                        <select name="categoria_id" class="form-control">
                    <!--Busca automaticamente as categorias cadastradas no banco-->
                    <?php foreach($categorias as $categoria) : ?>
                        <option value="<?=$categoria['id']?>"> <?=$categoria['nome']?> </option>   <!--value é o que passa para a pagina do form-->
                        <?php endforeach ?>
                        </select>
                </tr>
                <tr>
                    <td> <input class="btn btn-primary" type="submit" value="Cadastrar"></td> 
                </tr>
           </table>
        </form>
<?php include("rodape.php")?>