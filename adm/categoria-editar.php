<?php

    include_once('inc/classes.php');

    $cat = new Categoria();

    if(isset($_POST['btnEditar'])){
        $cat -> editar($_POST);
        header('location:categorias.php?ok');
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
    else 
    {
        header('location:categorias.php');
    }
   
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área administrativa - Editar Categoria</title>

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
            <h1>Editar Categoria</h1>
            <!-- Formulario -->
                <form action="?" method="post" class="border">
                    <input type="hidden" name="id_categoria" 
                    value="<?php echo $categoria -> id_categoria; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label mt-3" for="categoria">Categoria</label>
                            <input type="text" class="form-control mb-4" name="categoria" 
                            id="categoria" value="<?php echo $categoria -> categoria; ?>" required>
                        </div>
                        
                        <div class="col-md-2">
                            <input class="btn btn-dark mt-5" name="btnEditar" id="btnEditar" 
                            type="submit" value="Editar">
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