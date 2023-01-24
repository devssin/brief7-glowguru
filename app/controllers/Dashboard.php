<?php
class Dashboard extends Controller
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
            flash('not_logged', 'You need yo login first', 'p-4 mb-4 text-sm text-yellow-700 rounded-lg bg-yellow-50');
        }
        $this->productModel = $this->model('product');
        $this->categoryModel = $this->model('category');
    }

    public function index()
    {
        $products = $this->productModel->getProducts();
        $categories = $this->categoryModel->getCategories();

        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        $this->view('dashboard/index', $data);
    }

    public function category($id)
    {
        $products = $this->productModel->getProducts();
        if ($id > 0) {
            $products = $this->productModel->getProductsByCategory($id);
        }

        $data = json_encode($products);
        echo $data;
    }

    public function name($name)
    {
        if (empty($name)) {
            $products = $this->productModel->getProducts();
        } else {
            $products = $this->productModel->getProductsByName($name);
        }
        $data = json_encode($products);
        echo $data;
    }
}
