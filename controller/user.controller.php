<?php
//on inclue les model
require_once MODEL_PATH.'user'.MODEL_EXT;

//gestion des action
switch ($action) {
	case "addUser":
			/*
			 * verification des varrible du formulaire d'inscription
			 */
			if (!empty($_POST['identifiant'])&!empty($_POST['email'])&!empty($_POST['passwordSelect'])&!empty($_POST['passwordConfirm'])){
				
			}

			/*
			 * si les variable ne sont pas ok on redemande les information
			 * à l'utilisateur à l'aide de la vue user/addUser
			 */
				
			/*
			 * si les variable sont ok on conect la bdd
			 * on ajout l'utilisateur avec la fonction addUser();
			 */
			require_once VIEW_PATH.'user/addUser'.VIEW_EXT;
		break;

	case "deletUser":
		
		break;

	case "connexion":

		break;

	case "deconnexion":

		break;

	//action par defaut
	default:
		
		break;
}