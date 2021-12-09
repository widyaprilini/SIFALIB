<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AuthModel;
use CodeIgniter\HTTP\RequestInterface;

class Register extends BaseController{


    public function index(){
        //inc helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save(){
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'username'=> 'required|min_length[3]',
            'password'=> 'required|min_length[6]|max_length[200]',
        ];
         
        if($this->validate($rules)){
            $this->model = model(AuthModel::class);
            $data = [
                'username'=>$this->request->getVar('username'),
                'password'=>password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $this->model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}