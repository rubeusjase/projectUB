<?php
    class Koneksi
    {
        //buat variabel koneksi dg database mysql
        public $conn;
        private $serverName = 'localhost';
        private $nameUser = 'root';
        private $passUser = '';
        private $dbUser = 'frontend';
        private $sqlQuery;
        private $dataSet;

        //Constructor
        function __construct()
        {
            $this->bukaKoneksi();
        }
        //untuk membuka koneksi dg database frontend untuk sembarang tabel
        function bukaKoneksi()
        {
            $this->conn = mysqli_connect( 
                $this->serverName, 
                $this->nameUser, 
                $this->passUser, 
                $this->dbUser
            );
            if(!$this->conn)
            {
                die('Connection Failed !!! ');
            }
            return $this->conn;
        }

        function bacaTabelAll($namatabel)
        {
            $this->sqlQuery = "SELECT * FROM $namatabel ORDER BY id ASC";
            $this->dataSet = mysqli_query( $this->conn, $this->sqlQuery );
            return $this->dataSet;
        }
    }

    
?>