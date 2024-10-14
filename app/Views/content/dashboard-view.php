<div class="container is-fluid">
	<h1 class="title">Tablero</h1>
  	<div class="columns is-flex is-justify-content-center">
    	<figure class="image is-128x128">
    		<?php
    			/*if(is_file("./app/views/fotos/".$_SESSION['foto'])){
    				echo '<img class="is-rounded" src="'.APP_URL.'app/views/fotos/'.$_SESSION['foto'].'" alt="Imagen">';
    			}else{
    				echo '<img class="is-rounded" src="'.APP_URL.'app/views/fotos/default.png", alt="Imagen">';
    			}*/
    		?>
		</figure>
  	</div>
  	<div class="columns is-flex is-justify-content-center">
  		<h2 class="subtitle">¡Bienvenido Username<?php //echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>!</h2>
  	</div>
</div>