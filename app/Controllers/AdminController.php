<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AdminController extends BaseController
{
    function __construct(){
        
        $this->modelLib = model(LibraryModel::class);
        $this->modelSub = model(SubjectsModel::class);
        $this->modelJoinSub = model(JoinSubjectsModel::class);
        
    }

    //dashboard admin controller//
    public function index()
    {
        $session = session();
        $data['session'] = $session->get('username');
        $data['all'] = $this->modelLib->showAllDashboard();
      

        return view('admin/dashboard', $data);
    }

    public function search(){
        $filter=$this->request->getVar('filter');
        $keyword=strtolower($this->request->getVar('keyword'));

        if($this->request->getVar('filter')==null){
            echo "<script>window.alert('Pilih salah satu filter!')
            window.location='/dashboard'</script>";
        }else{
            $data['search_result']=$this->modelLib->search_in_admin($filter, $keyword);
            return view ('admin/search_result', $data);
        }
 
    }
    //dashboard admin controller end//
    //show pdf controller//
    public function pdf_view($fileName){
        $url = base_url('/publications/'.$fileName);
        $html = '<head><title>PDF VIEW</title></head><iframe src="'.$url.'" style="border:none; width: 100%; height: 100%"></iframe>';
        echo $html;
    }
    //show pdf controller end//
    //publications controller//
    public function post_publications_view()
    {   
        
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
                'rules'=>'required|numeric|exact_length[4]',
                'errors'=> [
                        'required'=>'{field} tidak boleh kosong',
                        'numeric'=>'{field} harus berupa angka',
                        'exact_length'=>'Jumlah karakter {field} harus berjumlah 4 karakter'
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
                        'mime_in'=>'Format {field} harus berupa .pdf',
                        'max_size'=>'{field} harus kurang dari 4mb',
                ]
            ]
                ]);
        if(!$rules){
            $session = session();
            if($this->request->getVar('subject_id')=== null){
                $session->setFlashdata('error_subject', 'Subjek publikasi harus di-isi minimal 1'); 
            }
            $session->setFlashdata('refill', 'Silakan pilih kembali'); 
            $validation = \Config\Services::validation();
            return redirect()->to('post-publications')->withInput();
        }else{
             
            $file=$this->request->getFile('file');
            $filename = rand(10,999).'-'.$this->request->getVar('year').' - '.$file->getClientName();
            $filedah = $file->move('./publications/', $filename);
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

    public function edit_publication_view($id){
        session();
        $data=[
            'title'=>'Detail Publikasi',
            'validation'=>\Config\Services::validation(),
            'subjects'=>$this->modelSub->findAll(),
            'old_file'=>$this->modelLib->getFile($id),
            'sub_checked'=>$this->modelLib->subjectperid($id),
            'publication'=>$this->modelLib->find($id)
        ];
        
        return view('admin/detail_publications', $data);
    }
    
    public function update_publication($id){
    
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
                'rules'=>'required|numeric|exact_length[4]',
                'errors'=> [
                        'required'=>'{field} tidak boleh kosong',
                        'numeric'=>'{field} harus berupa angka',
                        'exact_length'=>'Jumlah karakter {field} harus berjumlah 4 karakter'
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
        ]);

        if(!$rules){
            $session = session();
            if($this->request->getVar('subject_id')=== null){
                $session->setFlashdata('error_subject', 'Subjek publikasi harus di-isi minimal 1'); 
            }
             \Config\Services::validation();
            return redirect()->to('detail-publication/'.$id)->withInput();
        }else{
            $file=$this->request->getFile('file');
            $fileOriName = $file->getClientName();
           
            if($fileOriName!=''){
                $filename = rand(10,999).' - '.$this->request->getVar('year').' - '.$fileOriName;
                $filedah = $file->move('./publications/', $filename);
                $old_file = $this->request->getVar('old_file');
               
                $url = FCPATH.'publications/'.$old_file;
                unlink($url);
                
                $this->modelLib->update($id, [
                    'title'=>$this->request->getVar('title'),
                    'year'=>$this->request->getVar('year'),
                    'author'=>$this->request->getVar('author'),
                    'abstract'=>$this->request->getVar('abstract'),
                    'type'=>$this->request->getVar('type'),
                    'file'=>$filename
                ]);

                $subject_id=$this->request->getVar('subject_id');
                $this->modelJoinSub->deleteJoinSubject($id);
                
                foreach($subject_id as $sub){
                    $this->modelJoinSub->insert([
                        'subject_id'=>$sub,
                        'publications_id'=>$id
                    ]);
                }
                $session = session();
                $session->setFlashdata('success', 'Data Publikasi Berhasil Diperbarui'); 
                return redirect()->to('detail-publication/'.$id)->withInput();

            }else{
                $this->modelLib->update($id, [
                    'title'=>$this->request->getVar('title'),
                    'year'=>$this->request->getVar('year'),
                    'author'=>$this->request->getVar('author'),
                    'abstract'=>$this->request->getVar('abstract'),
                    'type'=>$this->request->getVar('type'),
                    
                ]);
                $subject_id=$this->request->getVar('subject_id');

                $subject_id=$this->request->getVar('subject_id');
                $this->modelJoinSub->deleteJoinSubject($id);
                
                foreach($subject_id as $sub){
                    $this->modelJoinSub->insert([
                        'subject_id'=>$sub,
                        'publications_id'=>$id
                    ]);
                }
                $session = session();
                $session->setFlashdata('success', 'Data Publikasi Berhasil Diperbarui'); 
                return redirect()->to('detail-publication/'.$id)->withInput();
            }
           
        }
    }
    
    public function delete_publication($id){
        $old_file = $this->modelLib->getFile($id);
        $delete_pub = $this->modelLib->delete($id);
        $session = session();
        if($delete_pub){
            $this->modelJoinSub->deleteJoinSubject($id);
            $url = FCPATH.'publications/'.$old_file['file'];
                    unlink($url);
            $session->setFlashdata('success', 'Data Publikasi Berhasil Dihapus'); 
            return redirect()->to('/dashboard')->withInput();
        }else{
            $session->setFlashdata('error', 'Data Publikasi Gagal Dihapus'); 
            return redirect()->to('/dashboard')->withInput();
        }
        
    }
    //publications controller end//

    //subject controller//
    public function post_subject_view(){
        $data=[
            'all_subjects' => $this->modelSub->findAll(),
            'validation'=> \Config\Services::validation()
        ];
        return view('admin/post_subjects', $data);
    }

    public function post_subject(){
        $session = session();
        $rules = $this->validate([
            'subject_name'=> [
                'label'=>'Subjek Publikasi',
                'rules'=>'required|is_unique[subjects.subject_name]|alpha',
                'errors'=> [
                        'required'=>'{field} tidak boleh kosong',
                        'is_unique'=>'{field} tersebut sudah tersedia',
                        'alpha'=>'Karakter {field} harus berupa huruf'
                ]
            ]
        ]);

        if(!$rules){
            \Config\Services::validation();
            return redirect()->to('/post-subject')->withInput();
        }else{
            $sub_name = $this->request->getVar('subject_name');
            $inserting = $this->modelSub->insert([
                'subject_name'=>$sub_name, 
            ]);
            if ($inserting){
                $session->setFlashdata('success', 'Subjek Publikasi Baru Berhasil Ditambahkan'); 
                return redirect()->to('/post-subject')->withInput();
            }else{
                $session->setFlashdata('error', 'Subjek Publikasi Baru Gagal Ditambahkan'); 
                return redirect()->to('/post-subject')->withInput();
            }
        }
    }

    public function delete_subject($id){
        $is_exist = $this->modelJoinSub->count_sub_id($id);
        if($is_exist>0){
            echo "<script>window.alert('Subjek ini masih digunakan di data publikasi, sehingga tidak dapat dihapus!')
            window.location='/post-subject'</script>";
        }else{
            $session = session();
            $delete_sub = $this->modelSub->delete($id);
            if($delete_sub){
                $session->setFlashdata('success', 'Subjek Publikasi Berhasil Dihapus'); 
                return redirect()->to('/post-subject')->withInput();
            }else{
                $session->setFlashdata('error', 'Subjek Publikasi Gagal Dihapus'); 
                return redirect()->to('/dpost-subject')->withInput();
            }
        }
    }
    //subject controller end//
   
}