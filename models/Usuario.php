<?php 
    class Usuario extends Conectar{
        public function login(){
            $conectar = parent::Conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){

                $correo = $_POST["correo"];
                $password = $_POST["pass"];
                
                if(empty ($correo) and empty($password )){
                    header("Location:" .Conectar::ruta()."index.php?m=2");
                    exit();
                }else{                          //nombre de tabla       //NOMBRE DEL CAMPO
                    $sql = "SELECT * FROM usuario WHERE usu_correo=? and clave=? and estado=1";
                    $stmt = $conectar ->prepare($sql);
                    $stmt ->bindParam(1,$correo);
                    $stmt ->bindParam(2,$password);
                    
                    $stmt ->execute();
                    $resultado = $stmt->fetch();
                    if(is_array($resultado) and count($resultado)>0){
                        $_SESSION[ "usu_id"]=$resultado["usu_id"];
                        $_SESSION[ "nombre"]=$resultado["nombre"];
                        $_SESSION[ "apellido"]=$resultado["apellido"];
                        $_SESSION[ "usu_correo"]=$resultado["usu_correo"];
                        header("Location:" .Conectar::ruta()."views/inicio.php");
                        exit();                        

                    }else{
                        header("Location:" .Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                    
                    
  
                }
            }  
        }        
    }
   
?>