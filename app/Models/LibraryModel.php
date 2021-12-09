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
        $this->db = \Config\Database::connect();
        // OR $this->db = db_connect();
    }
    public function showAllDashboard(){
        return $this->select('title, year, author, type')->findAll();
    }

}

?>