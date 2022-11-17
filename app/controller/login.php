<?php
 require './vendor/autoload.php';
 use Gregwar\Captcha\CaptchaBuilder;
 use Gregwar\Captcha\PhraseBuilder;
 
    class login extends Dcontroller{
     
       public function __construct(){
        $message = array();
        $data= array();
       
             parent::__construct();
        }
        public function index(){
           $this->login();
        }
        public function login(){
            
            $this->load->view('admin/header');
            Session::init();
            if(Session::get("login")==true){
                header("Location:".BASE_URL."/login/dashboard");
            }
            $this->load->view('admin/login');
            $this->load->view('admin/footer');
        }
        public function dashboard(){
            Session::chesksession_customer();
            $this->load->view("admin/header");
            $this->load->view("admin/menu");
            $this->load->view("admin/dashboard");
           $this->load->view("admin/footer");
        }
        // public function   authentication_login(){
        //     Session::init();
        //      $username = $_POST['username'];
        //      $password = md5($_POST['password']);
        //      $captcha=$_POST['captcha'];
        //     $table_admin='tbl_admin';
        //     $loginmodel = $this->load->model('loginmodel');

        //     $count =$loginmodel->login($table_admin,$username,$password);
        //     if($count==1 && isset($_SESSION['phrase']) &&
        //     PhraseBuilder::comparePhrases($_SESSION['phrase'], $captcha)  ){

        //         $result= $loginmodel->getlogin($table_admin,$username,$password);
                
        //        Session::set('login',true);
        //        Session::set('username',$result[0]['username']);
        //        Session::set('userid',$result[0]['admin_id']);
        //        $message['msg']="Xin chao '.$username.";
        //        header('Location:'.BASE_URL."/login/dashboard?msg=".urlencode(serialize($message)));
               
        //     }else{
        //         $message['msg']="Đăng nhập thất bai, tài khoản, mật khẩu hoặc captcha sai!!";
        //         header('Location:'.BASE_URL."/login/?msg=".urlencode(serialize($message)));
        //     }
        // }
        // public function logout(){
        //     Session::init();
        //     // Session::destroy();
        //     unset($_SESSION['login']);
        //     header("Location:".BASE_URL."/login");
        // }
    }
?>