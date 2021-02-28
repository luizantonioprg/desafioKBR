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
        <input type="text" placeholder="codigo" name="codigoCadastrar">
        <input type="text" placeholder="titulo" name="tituloCadastrar">

				<button type="submit" name="submitCreate">Criar</button>
        <?php
            foreach($data['msg'] as $m){
              echo "<h2>".$m."</h2>";
            }
        ?>
    	</form>