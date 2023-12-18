<?php
require_once 'config.php';

class User
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public  function getAll()
    {

        $query = $this->db->query('SELECT * FROM users');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save() {
        $query = $this->db->prepare('Update users set name = :name, email = :email where id =:id');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public  function getById($id)
    {

        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindParam(':id',$id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public  function getByEmail($email)
    {

        $query = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindParam(':email',$email, PDO::PARAM_STR);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function store() {
        $query = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $query->bindParam(':name', $this->name, PDO::PARAM_STR);
        $query->bindParam(':email', $this->email, PDO::PARAM_STR);
        $query->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setName($name) {
        $this->name = $name;
    }

}
?>