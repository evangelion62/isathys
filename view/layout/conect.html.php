<li class="conect"><a href="?controller=home">Espace membre</a>
    <div class="subnav">
		<form class="conect" method="post" action="index.php?controller=user&action=conect">
			<p>
			 	<input type="text" name="login" id="login" />
			 	<input type="password" name="password" id="password" />
			 	<input type="submit" value="Connexion" />
			 </p>
		</form>
		<form class="conect" method="post" action="index.php?controller=user&action=addUser">
			<p>
			 	<input type="submit" value="Inscription" />
			 </p>
		</form> 					
    </div>
</li>