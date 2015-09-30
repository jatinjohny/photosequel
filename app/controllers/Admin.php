<?php
/**
 * Created by PhpStorm.
 * User: jatinjohny
 * Date: 28-Sep-15
 * Time: 05:07
 */

class Admin extends Controller
{
    private $session;

    public function __construct()
    {
        parent::__construct();
        
        $this->session = Session::getInstance();
    }

    public function index()
    {
        if( false === $this->session->isLoggedIn()){

            header('location:' . URL . 'admin/login');
            
            exit();
        }
        
        if( isset($_FILES['image']) ) {
            
            $this->uploadPhoto($_FILES['image'], $_POST['caption']);
        }

        $page = 'admin';
        // load views. within the views we can echo out
        require APP_DIR . 'views/_templates/header.php';
        
        require APP_DIR . 'views/admin/index.php';
        
        require APP_DIR . 'views/_templates/footer.php';

        }

    public function login()
    {
        $class = '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->loadModel('User');

            $user = $this->model->authenticate($_POST['user'], $_POST['pass']);

            if (is_object($user)) {
                
                $this->session->login($user);
        
                header('location:' . URL . 'admin/index');
                
                exit();

            } else {

                $class = 'has-error';
            }
        }

        if ($this->session->isLoggedIn()) {

            header('location:' . URL . 'admin/index');
        
            exit();
        }

        $page = 'login';

        // load views. within the views we can echo out
        
        require APP_DIR . 'views/_templates/header.php';
        
        require APP_DIR . 'views/admin/login.php';
        
        require APP_DIR . 'views/_templates/footer.php';

    }

    public function logout()
    {
        $this->session->logout();
        
        header('location:' . URL . 'admin/login');

    }

    public function changePassword()
    {

    }
    
    private function uploadPhoto($image, $caption)
    {
                   	
        // Check if no file was uploaded
        if (!$image || empty($image) || !is_array($image)) {
        
            // Error: Nothing Uploaded
            return 'class="has-error"';

        } elseif ($image['error'] != 0) { // Check for upload errors
    
            // Fetch the error based on error code from upload_errors[]
            return 'class="has-error"';
        } else {
        
            // Well, IF no errors, lets initialize
            $tmpName    = $image['tmp_name'];
            $filename   = $image['name'];
            $type       = $image['type'];
            $size       = $image['size'];
            $caption    = $caption;
        }
        
        /**
         * Create Photograph Object and upload photo details to database
         */
        
        $this->loadModel('Photographs');
        $this->model->addPhoto($tmpName,  $filename, $type, $size, $caption);
        
    }

}