<?php
namespace App\Models;
use CodeIgniter\Model;

class LibraryModel extends Model{
    protected $table = "publications";
    protected $primaryKey = "id";
    protected $allowedFields = ["title", "year", "author", "abstract", "type", "file", "access"];
    
    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }
    public function showAllDashboard(){
        return $this->select('id,title, year, author, type')->findAll();
    }
    public function getFile($id){
        return $this->select('file')->where('id',$id)->first();
    }

    public function subjectperid($id){
        return $this->db->query('SELECT join_subjects.subject_id,subjects.subject_name  FROM join_subjects  JOIN subjects ON join_subjects.subject_id=subjects.id WHERE join_subjects.publications_id='.$id)->getResultArray();
    }

    private function getSub($subject_name){
        return $this->db->query("SELECT id FROM subjects WHERE subject_name LIKE '%".$subject_name."%'")->getRowArray();

    }

    public function search_in_admin($filter, $keyword){
        if($filter=='subject'){
            $subject_id = $this->db->query("SELECT id FROM subjects WHERE subject_name LIKE '%".$keyword."%'")->getRowArray();
            $result = $this->db->query('SELECT publications.*  FROM join_subjects  JOIN publications ON join_subjects.publications_id=publications.id WHERE join_subjects.subject_id='.$subject_id['id'])->getResultArray();
        }else{
            $result = $this->db->query("SELECT *  FROM publications WHERE ". $filter." LIKE '%".$keyword."%'")->getResultArray();
        }
        return $result;
    }

    public function front_search($filter, $keyword){

        $raw_query = null;
        for($i=0;$i<count($filter);$i++){
            if($filter[$i]==='subject'){
                for($j=0;$j<count($keyword['subject']);$j++){
                    $raw_query_before[] = "join_subjects.subject_id=".$keyword['subject'][$j];
                }
                $raw_query[]= "JOIN join_subjects ON join_subjects.publications_id=publications.id WHERE(". implode(' OR ', $raw_query_before).")";
            }
            if($filter[$i]==='year'){
                $raw_query[] = "(publications.year>=".$keyword['year'][0]." AND "."publications.year<=".$keyword['year'][1].")"; 
            }
            if($filter[$i]==="type"){
                for($j=0;$j<count($keyword['type']);$j++){
                    $raw_query_before[] ="(publications.type LIKE '%".$keyword['type'][$j]."%')"; 
                }
                $raw_query[]= "(". implode(' OR ', $raw_query_before).")";
            }
            if($filter[$i]==='title'){
                $raw_query[] = "(LOWER(publications.title) LIKE '%".$keyword['title']."%')"; 
            }
            $raw_query_before = null;
        }

        if($raw_query == null) $query = 'SELECT * FROM publications'; 
        else if(in_array("subject",$filter)){
            $query = 'SELECT publications.* FROM publications '.implode(' AND ', $raw_query );
        }else{
            $query = 'SELECT publications.* FROM publications WHERE '.implode(' AND ', $raw_query );
        }
        return $this->db->query($query)->getResultArray();
    }

    

}

?>