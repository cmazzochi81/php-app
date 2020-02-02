<?php
class Session{
    
    private $logged_in=false;
    public $admin_id;
    public $message;
    public $username;
    
    function __construct(){
        session_start();
        $this->check_login();
    }

     private function check_login(){
        if(isset($_SESSION['admin_id'])){
            $this->admin_id = $_SESSION['admin_id'];
            $this->logged_in = true;
        }else{
            unset($this->admin_id);
            $this->logged_in = false;
        }
    }
    
    public function is_logged_in(){
        return $this->logged_in;
    }
    
    public function login($user){
        //database should find user based on username/password
        if($user){
            $this->admin_id = $_SESSION['admin_id'] = $user->id;
            $this->username = $_SESSION['username'] = $user->username;
            $this->logged_in = true;
        }
    }
    
    public function logout(){
        unset($_SESSION['admin_id']);
        unset($this->admin_id);
        $this->logged_in = false;
    }

    public function message() {
        if (isset($_SESSION["message"])) {
            $output = "<div class=\"message\">";
            $output .= htmlentities($_SESSION["message"]);
            $output .= "</div>";
            
            // clear message after use
            $_SESSION["message"] = null;
            
            return $output;
        }
    }
    
 //    public function message($msg="") {
	//   if(!empty($msg)) {
	//     // then this is "set message"
	//     // make sure you understand why $this->message=$msg wouldn't work
	//     $_SESSION['message'] = $msg;
	//   } else {
	//     // then this is "get message"
	// 		return $this->message;
	//   }
	// }
    
   
    
}

$session = new Session();
?>