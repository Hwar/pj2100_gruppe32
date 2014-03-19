<html>

	
<head>
	<title> Layout av data!</title>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css"/> -->
	
	<style>
		/*
		#ramme1{
			float: left;
		}
		
		#ramme2{
			float: inherit;
		}

		#ramme3{
			float: right;
		}*/
		
		#ramme{
		margin-top: 0px;
		position: relative;
		width: 900px;
		}

		#infoboks {
		margin: 2px;
		display: inline-table;
		width: 268px;
		height: 150px;
		padding: 10px;
		resize:both;
		overflow:auto;
		border: 3px solid white;
		} 


		#infoboks:hover #innhold{
			display: table-row;
			max-height: 400px;
		
		}
		
		#innhold{
		display:none;
		}


		
	</style>
	
	
</head>

<body>

	<?php
		session_start();
		
		// DETTE SCRIPET ER FOR Å LETT KUNNE TESTE ULIKE PHP/MYSQL FUNKSJONER KNYTTET TIL DATABASEN!
		require "config.php";
		require "student.php";
		require "Utvalg.php";
		require "Sikkerhetskode.php";
		
		// Oppretter nytt student objekt
		$student = new Student($database);
		
		
		
		$utvalg = new Utvalg($database);
		$utvalg->getUtvalgOntudent("Hans");
		
		/*
		$idarray = $utvalg->getAllUtvalgId();
	
		$teller = 1;
		foreach ($idarray as $x) {
			
			if($teller == 1){
				echo "<div id=ramme1>";
				$utvalg->getUtvalgOnId($x);	
				echo "</div>";
			}else if($teller == 2){
				echo "<div id=ramme2>";
				$utvalg->getUtvalgOnId($x);	
				echo "</div>";
			}else if($teller == 3){
				echo "<div id=ramme3>";
				$utvalg->getUtvalgOnId($x);	
				echo "</div>";
				$teller = 0;
			}
			
			$teller++;
		}*/
		
		$utvalg->getAllUtvalg();
		
		// Denne fungerer 100% nå:)
		//$student->updateStudentPass("Hans", "hans1234", "hans");
		//$student->updateStudentEpost("hans", "Hans@lal.no");
		
		$kode = new SikkerhetsKode($database);
		
		echo $kode->getSikkerhetsKode("Student");
		
		?>
</body>
</html>
