<?php namespace Modules\category\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table      = 'categories';
    protected $useTimestamps = false;
    protected $allowedFields = ['name'];
    
    public function createNew(){

        $this->insert($_POST);
    }

    public function Income()
    {
        return $this->hasMany('Income', 'Modules\income\Models\Income');
        // $this->hasOne('propertyName', 'model', 'foreign_key', 'local_key');
    }
}