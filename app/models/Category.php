<?php 
class Category {
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCategories()
    {
        $this->db->query("SELECT * FROM category");
        $this->db->execute();
        return $this->db->resultSet();
    }
    
}

?>