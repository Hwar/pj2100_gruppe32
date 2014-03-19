<?php session_start();
	// Importerer nødvendige filer
	require "config.php";
	require "utvalg.php";
	
	// Nytt objekt av Utvalg classen
	$utvalg = new Utvalg($database);	

	$ider = $utvalg->getAllUtvalgId();
	// Looper igjennom dem
	foreach ($ider as $x) {
		// Og sjekker deretter hvilken "knapp" som er trykket på
		if(isset($_POST['input'.$x])){

			// Melder inn student i utvalg basert på hvilken knapp+ trykket
			$utvalg->meldInnStudent("hans", $x);

			// Melder inn student i utvalg basert på hvilken knapp trykket
			$utvalg->meldInnStudent($_SESSION['BrukerNavn'], $x);
		}
	}	
	
	// Sender bruker tilbake asap
	header("location: innlogget.php");

?>