<?php 	  
  if(isset($_SESSION['logado'])){
    header("Location:/HomeController/index");
  }
?>
<div class="containerLogo">
	<div class="slogan">
		<h1>Corcovado Express</h1>
		<i>A excelência em produtos que você merece</i>
	</div>
	<div class="imageLogoContainer">
		<img src="..\..\..\images\logo.png">
	</div>

	<section class="loginSection">
		<div class="loginFormContainer">
			<form class="login" action="/SignInController/signIn" method="POST">
				<input type="text" placeholder="Usuário" name="email">
				<input type="password" placeholder="Senha" name="senha">
				<button type="submit" name="submitLogin">Login</button>
    	</form>
		</div>



	</section>
</div>