<?php
require_once '../../App/models/ProductsModel.php';
require_once '../../App/router/MODEL_BASE.php';

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
        <a href="/HomeController/index">Home</a>
    </div>
    <span id="open">&#9776;</span>
  </div>
</div>
<button id="exportar">Exportar</button>




    <form class="login" action="" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="codigo" name="codigoCadastrar">
        <input type="text" placeholder="titulo" name="tituloCadastrar">
        <label for="categorias">Categorias</label>
        <select name="categoriaCadastrar" id="categorias">
          <option value="a">a</option> 
          <option value="a">a</option> 
          <option value="a">a</option>  
        </select>

        
        <label for="subcategorias">Subcategorias</label>
        <select name="subcategoriaCadastrar" id="subcategorias">
          <option value="a">a</option> 
          <option value="a">a</option> 
          <option value="a">a</option>  
        </select>
        <label for="descricao">Descricao</label>
        <textarea class="ckeditor" name="descricaoCadastrar"></textarea>
        <input type="text" placeholder="ImagemUrl" name="imagemCadastrar">
        <input type="text" placeholder="valor" name="valorCadastrar">
        <input type="text" placeholder="tag" name="tagCadastrar">
        <input type="text" placeholder="status" name="statusCadastrar">




				<button type="submit" name="submitCreate">Criar</button>
        <?php
            foreach($data['msg'] as $m){
              echo "<h2>".$m."</h2>";
            }
        ?>
    	</form>
      <script type="text/javascript" src="../../../dependencies/jquery/jquery.min.js"></script>      
      <script type="text/javascript" src="../../../dependencies/fileSaver/FileSaver.min.js"></script>
      <script type="text/javascript" src="../../../dependencies/sheetJS/xlsx.full.min.js"></script>
      <script src="../../../js/modules/consumeApi.js"></script> 
      




