<?php 

class Conn{

    private $bd;
    private $host;
    private $user;
    private $password;
    private $pdo;


    public function __construct() {

        $this->bd = 'tiposub';
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';

        $this->connect();
    }

    public function connect(){

        try {
            $dns = "mysql:host={$this->host};dbname={$this->bd};charset=utf8mb4";
            $this->pdo = new PDO($dns,$this->user,$this->password,array(

                \PDO::ATTR_EMULATE_PREPARES => false,
            
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            
            ));

            //Por defecto el fetch de las respuestas va a ser en forma fetch assoc, es decir, array asociativo.
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

            if ($this->pdo) {
                echo 'conectado exitosamente';
            }

        } catch (Exception $e) {
            throw new Exception("Error Processing Request".$e->getMessage(), 1);
            
        }
    }

    public function getConnect(){
        return $this->pdo;
    }

    
}

?>