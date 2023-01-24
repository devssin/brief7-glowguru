<?php

class Pages extends Controller {
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        $this->productModel = $this->model('product');
        $this->categoryModel =$this->model('category');
    }

    public function index(){
        $products = $this->productModel->getProducts();
        $data = [
            'products' => array_slice($products, 0, 8),
        ];
        $this->view("pages/index", $data);
    }
}