<?php

namespace App\Models;

use CodeIgniter\Model;

class Image extends Model
{
    protected $table            = 'images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
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




    public function storeImagePath($data)
    {
        $insert = array(
            'name'     => $data['name'],
            'path'     => $data['path'],
            'type'     => $data['type'],
        );

        $query = $this->db->table('images');
        $res = $query->insert($insert);
        return $res;
    }


    public function getImageData()
    {
        $images = $this->orderBy('id','DESC')->findAll();
        return $images;
    }
}
