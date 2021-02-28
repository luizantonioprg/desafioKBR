<?php

?>

<div class="containerLogo">
	<div class="slogan">
      <h1>Corcovado Express</h1>
    </div>
    <div class="imageLogoContainer">
      <img src="..\..\..\images\logo.png">
    </div>



      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" id="close" class="closebtn">&times;</a>
        <a href="/HomeController/logout">Sair</a>
    </div>
    <span id="open">&#9776;</span>
  </div>
</div>

<section class="usersActions">
  <div class=" act crudUserRead">
    <h3>Ações de Usuário</h3>
      <div class="actions">
          <div class="actionFlex">
            <?php 
               if($_SESSION['privilegio']=='admin'){
            ?>
            <a href="/UsersController/read" >LER  </a>
            <a href="/UsersController/update" >ATUALIZAR  </a>
            <a href="/UsersController/delete">DELETAR  </a>
            <a href="/UsersController/create">CADASTRAR  </a>
            <?php 
               }; 
            ?>
          </div>
       </div>
    </div>


  
  <div class=" act crudUserUpdate">
      <h3>Ações de Produtos</h3>
      <div class="actions">
          <div class="actionFlex">
            <a href="/ProductsController/read">LER  </a>
            <?php 
               if($_SESSION['privilegio']=='admin'){
            ?>
            <a href="/ProductsController/update">ATUALIZAR  </a>
            <a href="/ProductsController/delete">DELETAR  </a>
            <a href="/ProductsController/create">CADASTRAR  </a>
            <?php 
               }; 
            ?>
          </div>
       </div>
  
  </div> 
  <div class=" act crudUserDelete">
  <h3>Ações de Categorias</h3>
      <div class="actions">
          <div class="actionFlex">
            <a href="/CategoriesController/read">LER  </a>
            <?php 
               if($_SESSION['privilegio']=='admin'){
            ?>
            <a href="/CategoriesController/update">ATUALIZAR  </a>
            <a href="/CategoriesController/delete">DELETAR  </a>
            <a href="/CategoriesController/create">CADASTRAR  </a>
            <?php 
               }; 
            ?>
          </div>
       </div>  
  
  </div>
  <div class=" act crudUserCreate">
  <h3>Ações de Subcategorias </h3>
      <div class="actions">
          <div class="actionFlex">
            <a href="/SubCategoriesController/read" >LER  </a>
            <?php 
               if($_SESSION['privilegio']=='admin'){
            ?>
            <a href="/SubCategoriesController/update" >ATUALIZAR  </a>
            <a href="/SubCategoriesController/delete" >DELETAR  </a>
            <a href="/SubCategoriesController/create" >CADASTRAR  </a>
            <?php 
               }; 
            ?>
          </div>
       </div>  
  
  </div>
</section>
<a class="apiButton" href="/ApiController/consumeApi">API</a>






