<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class JoinSubjectsModel extends Model{
    protected $table = 'join_subjects';
    protected $allowedFields = ['publications_id', 'subject_id'];

    public function deleteJoinSubject($publication_id){
        return $this->db->query('DELETE from join_subjects WHERE publications_id ='.$publication_id);
    }
    public function count_sub_id($sub_id){
        return $this->db->query('SELECT * from join_subjects WHERE subject_id ='.$sub_id)->getNumRows();
    }
}