<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\AuthModel;
  

class SigninController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
  
    public function loginAuth()
    {
        $session = session();

        $model = new AuthModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $model->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['username'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('/dashboard');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }

        }else{
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->to('/signin');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/signin');
    }
}