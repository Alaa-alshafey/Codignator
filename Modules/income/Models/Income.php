<?php namespace Modules\income\Models;

use CodeIgniter\Model;

class Income extends Model
{
    protected $table      = 'incomes';
    protected $useTimestamps = false;
    protected $allowedFields = ['notes','cat_id','amount','date'];
    
    public function createIncome(){

        $this->insert($_POST);
    }

    public function category()
    {
        return $this->belongsTo('Category', 'Modules\category\Models\category');
        // $this->hasOne('propertyName', 'model', 'foreign_key', 'local_key');
    }
}