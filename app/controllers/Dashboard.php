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
        $statistics = $this->statistics();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'statistics' => $statistics
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

    public function name($name = null)
    {
        if ($name == null) {
            $products = $this->productModel->getProducts();
        } else {
            $products = $this->productModel->getProductsByName($name);
        }
        $data = json_encode($products);
        echo $data;
    }

    public function statistics()
    {
        $productCount = $this->productModel->getTotal();
        $categoryCount = $this->categoryModel->getTotal();
        $statistics = [
            'productCount' => $productCount->totalProd,
            'categoryCount' => $categoryCount->totalCat
        ];
        return $statistics;
    }

    public function getCategories()
    {
        $categories = $this->categoryModel->getCategories();
        $data = json_encode($categories);
        echo $data;
    }

    public function add()
    {
        $categories = $this->categoryModel->getCategories();

        $erros = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $count = count($_POST['name']);
            for ($i = 0; $i < $count; $i++) {

                //process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // process form
                $data = [
                    'name' => trim($_POST['name'][$i]),
                    'image' => $_FILES['image'],
                    'price' => trim($_POST['price'][$i]),
                    'description' => trim($_POST['description'][$i]),
                    'id_cat' => trim($_POST['id_cat'][$i]),
                    'errors' => '',
                    'categories' => $categories

                ];

                // echo'<pre>';
                // var_dump(($_FILES['image']['name'][0]));
                // echo'</pre>';
                // die();

                //Validate username
                if (empty($data['name'])) {
                    $erros = true;
                    $data['errors'] = $data['errors'] . ' <br>Name must be filled';
                }
                if ($data['image'] == null) {
                    $erros = true;
                    $data['errors'] = $data['errors'] . '<br>Image must be filled';
                }

                if (!$data['price']) {
                    $erros = true;
                    $data['errors'] = $data['errors'] . '<br>Price must be filled';
                }

                if (empty($data['description'])) {
                    $erros = true;
                    $data['errors'] = $data['errors'] . '<br>Description must be filled';
                }
                if (intval($data['id_cat']) == 0) {
                    $erros = true;
                    $data['errors'] = $data['errors'] . '<br>Category must be selected';
                }

               





                if (empty($data['errors'])) {
                    $data += ['imagePath' => URLROOT . '/public/' . $this->uploadImg($i)];
                    if ($this->productModel->addProduct($data)) {
                        flash('product_success', "Product Added Successfully");
                    } else {
                        die('somthing went wrong');
                    }
                } else {
                    flash('Errors', $data['errors'], 'p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50');
                    $this->view('dashboard/add', $data);
                    break;
                }
                if (!$erros) {
                    redirect('dashboard');
                }
            }
        } else {


            //init data 
            $data = [
                'name' => '',
                'image' => '',
                'description' => '',
                'price' => '',
                'id_cat' => '',
                'name_err' => '',
                'image_err' => '',
                'description_err' => '',
                'price_err' => '',
                'categories' => $categories
            ];
            //load form
            $this->view('dashboard/add', $data);
        }
    }



    public function edit($id)
    {
        $product = $this->productModel->getSingleProduct($id);
        // Check the request method
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //process form
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'image' => $_FILES['image'],
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'id_cat' => trim($_POST['id_cat']),
                'name_err' => '',
                'image_err' => '',
                'price_err' => '',
                'description_err' => '',
                'id_cat_err' => ''
            ];

            // var_dump($data);
            // die();


            //Validate username
            if (empty($data['name'])) {
                $data['name_err'] = 'Name must be filled';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Description must be filled';
            }
            if (empty($data['price'])) {
                $data['price_err'] = 'Price must be filled';
            }
            if ($data['id_cat'] == 0) {
                $data['id_cat_err'] = 'Category must be selected';
            }



            if (empty($data['name_err']) && empty($data['image_err']) && empty($data['description_err']) && empty($data['id_cat_err'])) {

                if (!empty($data['image']['name'])) {
                    $data += ['imagePath' => URLROOT . '/public/' . $this->uploadImg(0)];
                } else {
                    $data += ['imagePath' =>  $product->image];
                    // var_dump($data['imagePath']);
                    // exit;
                }
                if ($this->productModel->edit($data)) {
                    flash('product_success', "Product Edited Successfully");
                    redirect("dashboard");
                } else {
                    die('somthing went wrong');
                }
            } else {
                // Load view with errors 
                $this->view('dashboard/add', $data);
            }
        } else {
            $categories = $this->categoryModel->getCategories();

            //init data 
            $data = [
                'id' => $id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'description' => $product->description,
                'id_cat' => $product->category,
                'name_err' => '',
                'image_err' => '',
                'price_err' => '',
                'description_err' => '',
                'id_cat_err' => '',
                'categories' => $categories

            ];
            //load form
            $this->view('dashboard/edit', $data);
        }
    }

    public function delete($id)
    {
        if ($this->productModel->delete($id)) {
            flash("product_success", "Product deleted successfully");
            redirect('dashboard');
        } else {
            die("somthing went wrong");
        }
    }

    public function uploadImg($i = null)
    {
        $image = $_FILES['image'];

        if ($i == null) {
            $imagePath = "img/" . randomString(8) . "/" . $image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'][0], $imagePath);
        } else {

            $imagePath = "img/" . randomString(8) . "/" . $image['name'][$i];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'][$i], $imagePath);
        }
        return $imagePath;
    }
}
