<?php

namespace App\Models;

use CodeIgniter\Model;

class Ticket extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tickets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['usuario', 'category', 'priority', 'title',  'slug', 'description', 'evidence', 'url', 'status', 'phone', 'email', 'remote', 'dateMeeting', 'hourMeeting', 'ok'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];




    public function obetenerTicketsUsuarioActual()
    {
        $this->db->select('id, usuario, category, priority, title, slug, description, name, apaterno, amaterno');
        $this->db->from('tickets');
        $this->db->join('users', 'tickets.usuario = user.id');
        $query = $this->db->get();
        return $query->result();
    }

}
