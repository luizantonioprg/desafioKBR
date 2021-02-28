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







<form class="login" action="" method="POST" enctype="multipart/form-data">

        <input type="text" placeholder="codigo" name="codigoAtualizar">
        <input type="text" placeholder="titulo" name="tituloAtualizar">
        <label for="categorias">Categorias</label>
        <select name="categoriaAtualizar" id="categorias">
            <option value="laticinios">laticinios</option>
            <option value="verduras">verduras</option>
            <option value="carnes">carnes</option>
            <option value="eletrodomesticos">eletrodomesticos</option>
        </select>
        <label for="subcategorias">Subcategorias</label>
        <select name="subcategoriaAtualizar" id="subcategorias">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
        </select>
        <label for="descricao">Descricao</label>
        <textarea class="ckeditor" name="descricaoAtualizar"></textarea>
        <input type="text" placeholder="ImagemUrl" name="imagemAtualizar">
        <input type="text" placeholder="valor" name="valorAtualizar">
        <input type="text" placeholder="tag" name="tagAtualizar">
        <input type="text" placeholder="status" name="statusAtualizar">



        <?php
       // if(isset($_POST['submitUpdate'])){ 
            foreach($data['msg'] as $m){
              echo "<h2 >".$m."</h2>";

            }
         // }

        ?>

				<button type="submit" name="submitUpdate">Atualizar</button>
        </form>