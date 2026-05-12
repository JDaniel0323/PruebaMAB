<?php


class connection{

    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "mab", 3306);
    }

    public function getLogin($nombre, $pass)
    {
        $query = $this->conn->prepare("SELECT id, username, password_hash FROM usuarios WHERE username = ?");
            $query->bind_param("s", $nombre);

            $query->execute();

            $result = $query->get_result();
        return $result;
    }

    public function getUniversity($pais)
    {
        $url = "http://universities.hipolabs.com/search?country=" . urlencode($pais);
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        $return = [];

        $i = 0;
        $j = 0;
        while($j < count($data))
        {
            $return[$i] = $data[$j];
            $i++;
            $j++;
        }
        return $return;
    }
    public function saveUniversity($userId, $pais, $ruta) 
    {
        $query = $this->conn->prepare(
            "INSERT INTO descargas_pdf (user_id, pais, ruta_archivo, fecha) 
            VALUES (?, ?, ?, NOW())"
        );
        $query->bind_param("iss", $userId, $pais, $ruta);
        return $query->execute();
    }

    public function getHistory($userId)
    {
        $query = $this->conn->prepare("SELECT pais, ruta_archivo, fecha FROM descargas_pdf WHERE user_id = ? ORDER BY fecha DESC");
        $query->bind_param("i", $userId);
        $query->execute();
        return $query->get_result();
    }

    public function registerUser($username, $password) 
    {
        $passHash = password_hash($password, PASSWORD_BCRYPT);
        
        $query = $this->conn->prepare("INSERT INTO usuarios (username, password_hash) VALUES (?, ?)");
        $query->bind_param("ss", $username, $passHash);
        
        return $query->execute();
    }
}


?>