<?php

namespace App\Controllers;

use Modules\category\Models\Category;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->ModelsCategory = new Category();
        $this->db = db_connect(); // Loading database

	} 

    public function index()
    {

        $builder = $this->db->table("categories");
        $builder->select('categories.name,incomes.amount');
        $builder->join('incomes', 'categories.id = incomes.cat_id', "left"); // added left here
        $data = [
            'reports' =>$builder->get()->getResult()
        ];
        
        return view('admin/dashboard',$data);
    }
}
