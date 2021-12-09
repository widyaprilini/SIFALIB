<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;

  
class AdminController extends BaseController
{
    function __construct(){
        $this->modelLib = model(LibraryModel::class);
        $this->modelSub = model(SubjectsModel::class);
        $this->modelJoinSub = model(JoinSubjectsModel::class);
    }
    public function index()
    {
        $session = session();
        $data['session'] = $session->get('username');
        $data['all'] = $this->modelLib->showAllDashboard();

        return view('admin/dashboard', $data);
    }

    public function post_publications_view()
    {   
        session();
        $data=[
            'title'=>'Tambah Publikasi',
            'validation'=>\Config\Services::validation(),
            'subjects'=>$this->modelSub->findAll()
        ];
        return view('admin/post_publications', $data);
    }

    public function post_publications()
    {
       
        $rules = $this->validate([
            'title'=> [
                'label'=>'Judul Publikasi',
                'rules'=>'required|min_length[3]',
                'errors'=> [
                        'required'=>'{field} tidak boleh kosong',
                        'min_length'=>'Jumlah karakter {field} harus lebih dari 3 karakter'
                ]
            ],
            'year'=> [
                'label'=>'Tahun Publikasi',
                'rules'=>'required|numeric|max_length[4]',
                'errors'=> [
                        'required'=>'{field} tidak boleh kosong',
                        'numeric'=>'{field} harus berupa angka',
                        'min_length'=>'Jumlah karakter {field} harus lebih dari 3 karakter'
                ]
            ],
            'author'=> [
                'label'=>'Penulis Publikasi',
                'rules'=>'required',
                'errors'=> [
                        'required'=>'{field} tidak boleh kosong',
                ]
            ],
           
            'type'=> [
                'label'=>'Tipe Publikasi',
                'rules'=>'required',
                'errors'=> [
                        'required'=>'{field} tidak boleh kosong',
                ]
            ],
            'file'=> [
                'label'=>'File Publikasi',
                'rules'=>[
                    'uploaded[file]',
                    'mime_in[file,application/pdf]',
                    'max_size[file,4096]',
                ],
                'errors'=> [
                        'mime_in'=>'Format {field} harus pdf',
                        'max_size'=>'{field} harus kurang dari 4mb',
                ]
            ]
        ]);

        if(!$rules){
            $validation = \Config\Services::validation();
            return redirect()->to('post-publications')->withInput();
        }else{
             
            $file=$this->request->getFile('file');
            $filename = $this->request->getVar('year').' - '.$file->getClientName();
            $filedah = $file->move(WRITEPATH.'pub', $filename);
            $data = [
                'title'=>$this->request->getVar('title'),
                'year'=>$this->request->getVar('year'),
                'author'=>$this->request->getVar('author'),
                'abstract'=>$this->request->getVar('abstract'),
                'type'=>$this->request->getVar('type'),
                'file'=>$filename
            ];

            $this->modelLib->insert($data);
            $lastid = $this->modelLib->insertID();
            $subject_id=$this->request->getVar('subject_id');

            foreach($subject_id as $sub){
                $this->modelJoinSub->insert([
                    'subject_id'=>$sub,
                    'publications_id'=>$lastid
                ]);
            }
            return redirect()->to('/dashboard');
        
    
        
    }
}
}