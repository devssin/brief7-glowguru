<?php

Class Shop extends Controller {
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        $this->productModel = $this->model('product');
        $this->categoryModel = $this->model('category');



    }
    public function index(){
        $products = $this->productModel->getProducts();
        $categories = $this->categoryModel->getCategories();
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        $this->view('shop/index', $data);
    }

    public function product($id)
    {
        $product = $this->productModel->getSingleProduct($id);
        $data = [
            'product' => $product
        ];

        $this->view('shop/single', $data);
    }
}