<?php
    include_once('inc/css.php');
    include_once('inc/js.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">

    <form action="" class="get">
        <div class="row">

            <div class="col-md-6">
                <label class="form-label" for="nome" >Nome</label>
                <input class="form-control" type="text" name="nome" id="nome" value="">
            </div>

            <div class="col-md-6">
                <label class="form-label" for="copia" >Copia</label>
                <input class="form-control" type="text" name="copia" id="copia" value="">
            </div>

        </div>
    </form>

    </div>
    
</body>

    <script>
    $('#nome').keyup(function (e) { 
        let nome = $(this).val();
        $('#copia').val(nome.toUpperCase());
    });        
    </script>

</html>