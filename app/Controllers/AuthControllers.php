<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Helpers\authHelpers;
use function PHPSTORM_META\map;
use CodeIgniter\Controller;

class AuthControllers extends BaseController
{
    use ResponseTrait;
    protected $userModel;
    public $session;
    function  __construct()
    {
        $this->userModel = new \App\Models\Users();
        $this->session =  session();
    }

    public function index() //read
    {
        // 'Numquam ut mollitia at consequuntur inventore dolorem.'

        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $result = $this->userModel->select('username, password')
            ->where('username =', $username)
            ->where('password =', $password)
            ->get()->getResult();
        if ($result) {
            $userdata = [
                'username' => $result[0]->username,
                'logged_in' => true,
            ];

            $this->session->set($userdata);

                // remember me
            if(!empty($this->request->getPost("remember"))) {
                setcookie ("loginId", $username, time()+ (10 * 365 * 24 * 60 * 60));  
                setcookie ("loginPass", $password,  time()+ (10 * 365 * 24 * 60 * 60));
                } else {
                setcookie ("loginId",""); 
                setcookie ("loginPass","");
                }          

                $message = ['message' => "Login Berhasil", "userdata" => $userdata];
                return $this->setResponseFormat('json')->respond($message, 200);
        }
        $message = ['message' => "Login gagal"];
        return $this->setResponseFormat('json')->respond($message, 200);
    }
    public function store() //update
    {
    }

    public function update() //edit
    {
    }

    public function delete() //delete
    {
    }

    public function logout()
    {
    
    }
}
