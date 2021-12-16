<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    function __construct(){
        
        $this->modelSub = model(SubjectsModel::class);
        $this->modelJoinSub = model(JoinSubjectsModel::class);
        
    }
    public function index()
    {
        $data=[
            'subject'=>$this->modelSub->findAll()
        ];
        return view('home', $data);
    }
}
