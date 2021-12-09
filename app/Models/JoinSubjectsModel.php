<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class JoinSubjectsModel extends Model{
    protected $table = 'join_subjects';
    protected $allowedFields = ['publications_id', 'subject_id'];
}