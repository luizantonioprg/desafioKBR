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

      <form class="login" action="" method="POST">
				<input type="text" placeholder="Digite o codigo" name="codigoDeletar">
				<button type="submit" name="submitDeletar">Deletar</button>
    	</form>
      <?php
          
          foreach($data['msg'] as $m){
            echo "<h2>".$m."</h2>";

          }

     

        ?>