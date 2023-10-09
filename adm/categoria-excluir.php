<?php

    include_once('inc/classes.php');

    $cat = new Categoria();

    if(isset($_POST['btnExcluir']))
    {
        $cat->excluir($_POST['id_categoria']);
        header('location:categorias.php?e'); 
    }

  // Pegar o id da categoria que vai ser editada 
  if(isset($_GET['id']) && $_GET['id'] !='')
  {
       $categoria = $cat -> mostrar($_GET['id']);

       if(!$categoria)
       {
          header('location:categorias.php');
       }
  }
   
    if(isset($_POST['btnNao'])){
        header('location:categorias.php?ok');
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área administrativa - Excluir Categoria</title>

    <!-- CSS / JS -->
    <?PHP 
    include_once('inc/css.php');
    include_once('inc/js.php');?>
    <!-- / CSS / JS -->
</head>
<body>
    
    <div class="container">
    <!-- Menu -->
        <div class="row">
           <?php include_once('inc/menu-adm.php'); ?>
        </div>
    <!-- /Menu -->


    <!-- Principal -->
        <div class="row">
            
            <!-- Formulario -->
                <form action="?" method="post" class="border">
                <input type="hidden" name="id_categoria" 
                    value="<?php echo $categoria -> id_categoria; ?>">
                    <div class="row">
                    <div class="col-md-6">
                            <label class="form-label mt-3" for="categoria"><h1>Excluir Categoria: <?php echo $categoria -> categoria;?></h1>
                        </div>
                        
                        <div class="col-md-2">
                            <input class="btn btn-dark mt-4" name="btnExcluir" id="btnExcluir" 
                            type="submit" value="Excluir">
                        </div>

                        <div class="col-md-2">
                            <input class="btn btn-dark mt-4" name="btnNao" id="btnNao" 
                            type="submit" value="Não">
                        </div>
                    
                    </div>
                </form>
            <!-- /Formulario -->
        </div>
    <!-- /Principal -->


    <!-- Rodape -->
        <div class="row">
            Rodapé  
        </div>
    <!-- /Rodape -->

    </div>

</body>
</html>