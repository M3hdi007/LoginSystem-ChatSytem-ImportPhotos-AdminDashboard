<?php

			if (isset($_GET['bothunset'])||isset($_GET['usetunset'])||isset($_GET['psdunset'])) {
				if ($_GET('bothunset')=="true") {
					$loginerreur="Merci d'entrer le nom utilisatuer et mot de passe";
				}
				else if ($_GET('usetunset')=="true") {
					$loginerreur="Merci d'entrer le nom utilisatuer";
				}
				else if ($_GET('psdunset')=="true"){
					$loginerreur="Merci d'entrer le mot de passe correctement";
				}
				else {
                                 $loginerreur="Une erreur unplanifié est subi , Merci de réessayer ulterieurement"; 
				}
			}