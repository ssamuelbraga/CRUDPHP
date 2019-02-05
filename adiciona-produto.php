<?php include("cabecalho.php")?>
<?php include ("conexao-banco.php")?>
<?php include ("banco-produto.php")?>

<?php

    $nome=$_POST["nome"];
    $preco=$_POST["preco"];
    $descricao=$_POST["descricao"];
    $categoria_id=$_POST["categoria_id"];

    if(array_key_exists('usado', $_POST)){             //testa se o checkbox foi marcado
        $usado=1;
    }else{
        $usado=0;
    }
    
    
    if(insereProduto($conexao,$nome,$preco,$descricao,$categoria_id,$usado))                                                              
    {
        ?> <p class="alert alert-success">Produto <?php echo $nome?> com valor de R$ <?php echo $preco ?> adicionado com sucesso!</p>
    <?php }
    else{ 
        $msg = mysqli_error($conexao);
        ?>
        <p class="alert alert-danger">Houve um erro! Produto <?php echo $nome?> não foi adicionado: <?php echo $msg ?></p>
    <?php 
        
}                                                                  
    mysqli_close($conexao);                                                                        //fecha conexao
?>
  

<?php include("rodape.php")?>