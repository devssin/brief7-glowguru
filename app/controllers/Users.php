<?php 
class Users extends Controller{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('user');
    }

    public function login(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($data['username'])) {
                $data['username_err'] = 'username must be filled';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Password must be filled';
            }

            if(!$this->userModel->findUserByUsername($data['username'])){
                $data['username_err'] = 'User not found';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                if($loggedInUser){
                    flash('login_success', "You are now logged in");
                    $this->createUserSession($loggedInUser);
                    

                }else{
                    $data['password_err'] = "Password is incorrect";
                    $this->view('users/login',$data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {

            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['username'] = $user->username;
        $_SESSION['user_id'] = $user->id;
        redirect('dashboard');
    }

    public function logout(){
      
        unset($_SESSION['username']);
        session_destroy();
        redirect('users/login');
    }

}