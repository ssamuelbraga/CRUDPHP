<?php include ("cabecalho.php")?>
<?php include ("conexao-banco.php")?>
<?php include ("banco-produto.php")?>

<?php
    if(array_key_exists("removido",$_GET) && $_GET["removido"]==true){ ?>
        <p class="alert alert-success">Produto deletado com sucesso!</p>
<?php 
    }
?>

<?php

$produtos=listaProdutos($conexao);

?>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">NOME</th>
            <th scope="col">PREÇO</th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">CATEGORIA</th>
            </tr>
        </thead>
        <tbody>
            <tr><?php
            foreach($produtos as $produto){ ?>
            <td><?php echo $produto['nome'];?></td>
            <td>R$ <?php echo $produto['preco'];?></td>
            <td><?php echo substr($produto['descricao'],0,50);?></td>
            <td><?php echo $produto['categoria_nome'] ?></td>
            <td><a class="btn btn-primary" href="altera-produto.php?id=<?=$produto['id']?>">Alterar</a></td>
            <td>
            <form action="remove-produto.php" method="POST">
                <input type="hidden" name="id" value="<?=$produto['id']?>">
                <button class="btn btn-danger" role="button" aria-pressed="true">Remover</button>
            </form>
            </tr>
            <?php }?>           
        </tbody>
  
</table>

<?php include ("rodape.php")?>