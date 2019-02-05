<?php include("cabecalho.php")?>
<?php include ("conexao-banco.php")?>
<?php include ("banco-produto.php")?>

<?php
    $id=$_POST['id'];   //echo $id para verificar se o id foi enviado para essa pagina
    

    if(removeProduto($conexao,$id)){
      header("Location: produto-lista.php?removido=true");
      die();                                                     //sempre colcoar die apos Location
    } else{
        $msg = mysqli_error($conexao);
        ?>
        <p class="alert alert-danger">Houve um erro! Produto <?php echo $id?> não foi adicionado: <?php echo $msg ?></p> <?php
    }
    ?>

