<?php
    abstract class configuracion
    {
        protected $datahost;
        /*EVITAMOS EL CLONAJE DEL OBJETO. PATRÓN SINGLETON*/
        private function __clone(){ }

        protected function conectar($archivo = 'configuracion.ini')
        {

            if (!$ajustes   = parse_ini_file($archivo, true))
            {
                throw new exception ('No se puede abrir el archivo ' . $archivo . '.');
            }else{
                    $controlador    = $ajustes["database"]["driver"];   //CONTROLADOR
                    $servidor       = $ajustes["database"]["host"];     //LOCALHOST
                    $puerto         = $ajustes["database"]["port"];     //PUERTO DE LA BD
                    $basedatos      = $ajustes["database"]["schema"];   //NOMBRE DE LA BD
                    $username       = $ajustes["database"]["username"]; //USUARIO
                    $password       = $ajustes["database"]["password"]; //CONTRASEÑA

                    try{
                        return $this->datahost = new PDO ("mysql:host=$servidor;port=$puerto;dbname=$basedatos",
                                                           $username,
                                                           $password,
                                                           array(
                                                                    PDO::ATTR_PERSISTENT            => true,
                                                                    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                                                                    PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8"
                                                                )
                                                         );
                        }
                    catch(PDOException $e){
                            die("Error en la conexión: ".$e->getMessage());
                        }
                        $this->datahost = null;
                 }//FIN DE ABRIR ARCHIVO
        }//FIN DE LA FUNCION CONECTAR
    }//FIN DE LA CLASE