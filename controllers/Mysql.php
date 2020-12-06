<?php
	class MYSQL
	{	
	    public function connect(){
	    	// - localhot-  usuario - contraseña - base de datos
			$conn = new mysqli("localhost", "root", "", "restaurante");

			if( $conn ) {
			     return $conn;	
			}else{
			    $conn = null;
			}
			return $conn;
	    }


	}
?>