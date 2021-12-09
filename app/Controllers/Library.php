<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\LibraryModel;

class Library extends BaseController
{
    use ResponseTrait;
    function __construct(){
        $this->model = model(LibraryModel::class);
    }
    public function index()
    {
        
       $data = $this->model->orderBy('id','asc')->findAll();
       return $this->respond($data, 200);
    }

    public function show($id = null){
        $data = $this->model->where('id', $id)->findAll();

        if($data){
            return $this->respond($data, 200);
        }else{
            return $this->failNotFound("Data tidak ditemukan untuk id $id");
        }
    }

    // public function create(){
        
        // $data = [
        //     'title'=>$this->request->getVar('title'),
        //     'year'=>$this->request->getVar('year'),
        //     'author'=>$this->request->getVar('author'),
        //     'abstract'=>$this->request->getVar('abstract'),
        //     'type'=>$this->request->getVar('type'),
        //     'file'=>$this->request->getVar('file'),
        //     'access'=>$this->request->getVar('access')
        // ];

    //     $data = $this->request->getPost();

    //     // $this->model->save($data);
    //     if(!$this->model->save($data)){
    //         return $this->fail($this->model->errors());
    //     }
    //     $response = [
    //         'status'=>201,
    //         'error'=>null,
    //         'messages'=>[
    //             'success'=>'Berhasil input data publikasi'
    //         ]
    //     ];
    //     return $this->respond($response);
    // }

    // public function update($id = null){
    //     $is_exist = $this->model->where('id', $id)->findAll();
    //     $data = $this->request->getRawInput();
    //     if(!$is_exist){
    //         return $this->failNotFound("Data tidak ditemukan untuk id $id");
    //     }

    //     if(!$this->model->save($data)){//Jika ada error saat updating
    //         return $this->fail($this->model->errors());
    //     }

    //     $response = [
    //         'status'=>200,
    //         'error'=>null,
    //         'message'=>[
    //             'success' =>'Data berhasil di-update!'
    //         ]
    //         ];
    //     return $this->respond($response);
    // }

    // public function delete($id = null){
    //     $data = $this->model->where('id')->findAll();
    //     if($data){
    //         $this->model->delete($id);
    //         $response = [
    //             'status'=>200,
    //             'error'=>null,
    //             'message'=>[
    //                 'success'=>'Data berhasil dihapus!'
    //             ]
    //             ];
    //             return $this->respondDeleted($response);
    //     }else{
    //         return $this->failNotFound('Data tidak Ditemukan!');
    //     }
    // }

}
