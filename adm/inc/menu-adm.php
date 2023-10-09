<?php
   Helper::taLogado();
?>

<div class="row pt-2">
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page">
          <?php 
          if(isset($_SESSION['nome']))
          { 
            echo $_SESSION['nome'];
            }
            else 
            {
              
            }
            ?>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/receitas/adm/usuarios.php"><i class="bi bi-person-fill"></i> Usuários</a>
        </li>
        <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="http://localhost/receitas/adm/categorias.php"><i class="bi bi-justify"></i> Categorias
         </a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="http://localhost/receitas/adm/receitas.php"><i class="bi bi-egg"></i> Receitas
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="http://localhost/receitas/adm/banners.php"><i class="bi bi-camera-fill"></i> Banners
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="http://localhost/receitas/adm/logoof.php">Sair
        <i class="bi bi-arrow-bar-right"></i></a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
</div>