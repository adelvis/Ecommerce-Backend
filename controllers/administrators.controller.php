<?php


/**
 * administrators
 */


class ControllerAdministrators
{
	
		public function ctrAccessAdministrator(){


			if(isset($_POST["ingEmail"])){

	

				if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

					$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$table ="administrators";
					$item= "email";
					$value =$_POST["ingEmail"];

					
					$answer = ModelAdministrators::mdlViewAdministrators($table, $item, $value);


					if ($answer["email"] == $_POST["ingEmail"] && $answer["password"]== $encriptar){

						if($answer["state"] ==1){


							$_SESSION["validarSesionBackend"] = "ok";
							$_SESSION["id"] = $answer["id"];
							$_SESSION["nombre"] = $answer["name"];
							$_SESSION["foto"] = $answer["photo"];
							$_SESSION["email"] = $answer["email"];
							$_SESSION["password"] = $answer["password"];
							$_SESSION["perfil"] = $answer["profile"];

						
							echo '<script>

								window.location = "inicio";

							</script>';



						}else{


							echo '<br>

							<div class="alert alert-warning">Este usuario aun no está activado</div>



							';


						}
						


					}else{


						echo '<br>

						<div class="alert alert-danger">Error al ingresar, vuelva a intentarlo</div>	
						';

							
					}


					


				}
				
				



			}



		}

		/*=============================================
		=         MOSTRAR  ADMINISTRADORES      =
		=============================================*/

		static public function ctrViewAdministrators($item, $value){

			$table ="administrators";
			
			$answer = ModelAdministrators::mdlViewAdministrators($table, $item, $value);

			return $answer;


		}

		/*=============================================
		=        CREAR UN PERFIL     =
		=============================================*/
		static public function ctrCreateProfile(){

			if(isset($_POST["nuevoPerfil"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   		preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){
		   			/*=============================================
					VALIDAR IMAGEN
					=============================================*/

					$ruta = "";

					if(isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])){

						list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

						$nuevoAncho = 500;
						$nuevoAlto = 500;


						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "views/img/perfiles/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino, $ruta);

						}

						if($_FILES["nuevaFoto"]["type"] == "image/png"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "views/img/perfiles/".$aleatorio.".png";

							$origin = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

							$destiny = imagecreatetruecolor($new_Width, $new_height);

							imagecopyresized($destiny, $origin, 0, 0, 0, 0, $new_Width, $new_height, $width, $height);

							imagepng($destiny, $ruta);

						}

					}



					$table = "administrators";

					$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$datos = array("name" => $_POST["nuevoNombre"],
						           "email" => $_POST["nuevoEmail"],
						           "password" => $encriptar,
						           "profile" => $_POST["nuevoPerfil"],			       
						           "photo"=>$ruta,
						           "state" => 1);

					$respuesta = ModelAdministrators::mdlInsertProfile($table, $datos);
					
					if($respuesta == "ok"){

						echo '<script>

						swal({

							type: "success",
							title: "¡El perfil ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "profiles";

							}

						});
					

						</script>';


					}	







				}else{

					echo '<script>

						swal({

							type: "error",
							title: "¡El perfil no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "profiles";

							}

						});
					

					</script>';

				}



			}





		}

		/*=============================================
		=        ACTUALIZAR UN PERFIL     =
		=============================================*/
				
		static public function ctrEditProfile(){

			if(isset($_POST["idPerfil"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

					/*=============================================
					VALIDAR IMAGEN
					=============================================*/

					$ruta = $_POST["fotoActual"];

					if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

						list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

						$nuevoAncho = 500;
						$nuevoAlto = 500;

						/*=============================================
						PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
						=============================================*/

						if(!empty($_POST["fotoActual"])){

							unlink($_POST["fotoActual"]);

						}

						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["editarFoto"]["type"] == "image/jpeg"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "views/img/perfiles/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino, $ruta);

						}

						if($_FILES["editarFoto"]["type"] == "image/png"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "views/img/perfiles/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino, $ruta);

						}

					}

					$table = "administrators";

					if($_POST["editarPassword"] != ""){

						if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

							$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

						}else{

							echo'<script>

									swal({
										  type: "error",
										  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result) {
											if (result.value) {

											window.location = "Perfiles";

											}
										})

							  	</script>';

						}

					}else{

						$encriptar = $_POST["passwordActual"];

					}

					$datos = array("id" => $_POST["idPerfil"],
								   "name" => $_POST["editarNombre"],
								   "email" => $_POST["editarEmail"],
								   "password" => $encriptar,
								   "profile" => $_POST["editarPerfil"],
								   "photo" => $ruta);

					

					$answer = ModelAdministrators::mdlEditProfile($table, $datos);

					if($answer == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El perfil ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result) {
										if (result.value) {

										window.location = "profiles";

										}
									})

						</script>';

					}


				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result) {
								if (result.value) {

								window.location = "profiles";

								}
							})

				  	</script>';

				}

			}

		}


	/*=============================================
	ELIMINAR PERFIL
	=============================================*/

	static public function ctrDeletePerfil(){

		if(isset($_GET["idPerfil"])){

			$table ="administrators";
			$datos = $_GET["idPerfil"];

			if($_GET["fotoPerfil"] != ""){

				unlink($_GET["fotoPerfil"]);
			
			}

			$respuesta = ModelAdministrators::mdlDeleteProfile($table, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "profiles";

								}
							})

				</script>';

			}		

		}

	}


}

