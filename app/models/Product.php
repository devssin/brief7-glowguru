<?php

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProducts()
    {
        $this->db->query("SELECT product.id as 'id' , product.name as 'name', product.image as 'image', product.price as 'price' , 
        product.description as 'description' , product.price as 'price' ,
        category.name_cat as 'category' from product JOIN category on product.id_cat = category.id");
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getTotal()
    {
        $this->db->query("SELECT COUNT(*) as 'totalProd' from product");
        $this->db->execute();
        return $this->db->single();
    }
    public function getProductsByCategory($id)
    {
        $this->db->query("SELECT product.id as 'id' , product.name as 'name', product.image as 'image', product.price as 'price' , 
        product.description as 'description' , product.price as 'price' ,
        category.name_cat as 'category' from product JOIN category on product.id_cat = category.id where product.id_cat = :id");
        $this->db->bind(':id', intval($id));
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getProductsByName($name)
    {
        $this->db->query("SELECT product.id as 'id' , product.name as 'name', product.image as 'image', product.price as 'price' , 
        product.description as 'description' , product.price as 'price' ,
        category.name_cat as 'category' from product JOIN category on product.id_cat = category.id where product.name like '%$name%'");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getSingleProduct($id)
    {
        $this->db->query("SELECT product.id as 'id', product.name as 'name', product.image as 'image', product.price as 'price' , 
        product.description as 'description' , product.price as 'price' ,
        category.name_cat as 'category' from product JOIN category on product.id_cat = category.id WHERE product.id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->single();
    }



    public function addProduct($product)
    {
        $this->db->query("INSERT INTO product(name , image ,price, description , id_cat) VALUES (:name , :image ,:price, :description , :id_cat)");
        $this->db->bind("name", $product['name']);
        $this->db->bind("image", $product['imagePath']);
        $this->db->bind("price", floatval($product['price']));
        $this->db->bind("description", $product['description']);
        $this->db->bind("id_cat", intval($product['id_cat']));
        $this->db->execute();
        if ($this->db->rowCount() < 1) {
            return false;
        }
        return true;
    }

    public function edit($product)
    {
        $this->db->query('UPDATE product SET name = :name , image = :image ,price = :price ,description = :description , id_cat = :id_cat  WHERE id = :id');
        $this->db->bind('id', intval($product['id']));
        $this->db->bind("name", $product['name']);
        $this->db->bind("image", $product['imagePath']);
        $this->db->bind("price", $product['price']);
        $this->db->bind("description", $product['description']);
        $this->db->bind("id_cat", intval($product['id_cat']));
        $this->db->execute();
        if ($this->db->rowCount() < 1) {
            return false;
        }
        return true;
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM product WHERE id = :id');
        $this->db->bind('id', intval($id));
        $this->db->execute();
        if ($this->db->rowCount() < 1) {
            return false;
        }
        return true;
    }
}
