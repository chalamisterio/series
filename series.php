<?php 
	
	session_start();

	if (!isset($_SESSION['para_assistir']) || !count($_SESSION['para_assistir'])) {
		$_SESSION['para_assistir'] = [];
	}

	if (!isset($_SESSION['disponiveis']) || !count($_SESSION['disponiveis'])) {
		
		$_SESSION['disponiveis'] = array(
			'Game of Thrones',
			'La casa de papel',
			'Big Little Lies',
			'The Hausting of Hill House',
			'Westworld',
			'Tha Hnadmaid\'s Tale',
		);
	if(!isset($_SESSION['assistidos'])|| !count($_SESSION['assistidos'])){
		$_SESSION['assisidos']=[];
	}
	} 
	else {
		// $ultima = count($_SESSION['disponiveis'])-1;
		// unset($_SESSION['disponiveis'][$ultima]);
	}
	if ($_GET['action']) {
		switch ($_GET['action']) {
			case 'para_assistir':
				
			if(isset($_GET[id]))

				$id = $_GET['id'];
				$_SESSION['para_assistir'][] = $_SESSION['disponiveis'][$id];
				unset($_SESSION['disponiveis'][$id]);

                break;
            case   'assistidos':
                $id = $_GET['id'];
                $_SESSION['assistidos'][]= $_SESSION['para_assistir'][$id];
                unset($_SESSION['para_assistir'][$id]);
                
                break;
            case 'para_assistir':

                $_SESSION['para_assistir'][] = $_SESSION['assistidos'][$id];
                unset($_SESSION['assistidos'][$id]);

                break;
            case 'disponiveis':
            
            $_SESSION['disponiveis'][]= $_SESSION['para_assistir'][$id];
            unset($_SESSION['para_assistir'][$id]);
            
            default:
				// code...
				break;
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de séries 🎞</title>

	<link href="style.css?v=<?= rand() ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap" rel="stylesheet">

</head>
<body>
	
	<h1 id="site_title">Minha lista de Séries 📽</h1>
	
	<div class="col-33">
		<h2 class="category_title">🎞 Disponíveis</h2>
		<ul>
			<?php 

				foreach ($_SESSION['disponiveis'] as $index => $serie) {
                    echo "
                    <li>
                        $serie
                        <a href=\"?action=disponiveis&id=$index\">
                            &rarr;
                        </a>
                    </li>";
                    
				}

				foreach($_SESSION['para_assistir'] as $index => $serie){
					echo"
					<li>
						$serie
						<a href=\"?action=para_assistir&id=$index\">
						 &rarr;
					</a>
					echo"
					<li>
						$serie
						<a href=\"?action=para_assistir&id=$index\">
						 &rarr;
					</a>
						
					</li>";	 
				}

				foreach($_SESSION['assistidos'] as $index => $serie){
					echo"
					<li>
						$serie
						<a href=\"?action=para_assistir&id=$index\">
						 &rarr;
					</a>
					</li>";	 
				}
			 ?>
		</ul>
	</div>

	<div class="col-33">
		<h2 class="category_title">🍿 Para Assistir</h2>
		<ul>
			<li>...</li>
			<li>...</li>
			<li>...</li>
		</ul>
	</div>

	<div class="col-33">
		<h2 class="category_title">🥰 Assistidos</h2>
		<ul>
			<li>...</li>
			<li>...</li>
			<li>...</li>
		</ul>
	</div>

	<div class="col-33">
		<h2 class="category_title">🥰 Diponíveis</h2>
		<ul>
			<li>...</li>
			<li>...</li>
			<li>...</li>
		</ul>
	</div>
<hr>
<pre><?php 
	print_r($_SESSION);
	 ?>
</pre>

</body>
</html>