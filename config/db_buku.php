<?php
class db_buku
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'toko_buku_2';
    private $koneksi;
    private $ambil_data;

    // Method untuk melakukan koneksi ke database
    public function koneksi()
    {
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->koneksi->connect_error) {
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }


    public function ambil_data($query)
    {
        $this->koneksi();
        $hasil = $this->koneksi->query($query);
        $item = array();
        if ($hasil->num_rows > 0) {
            while ($row = $hasil->fetch_assoc()) {
                $item[] = $row;
            }
        }
        return $item;
    }
}
?>