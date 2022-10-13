<?php namespace Modules\category\Controllers;

use App\Controllers\BaseController;
use Modules\admin\Models\Category;
use Modules\category\Models\Category as ModelsCategory;

class CategoryController extends BaseController
{

	public function __construct()
	{
		$this->ModelsCategory = new ModelsCategory();
	} 
	public function index()
	{

		$categories = $this->ModelsCategory->findAll();

		$data = [
			'categories' => $categories,
		];
		
		echo view('\Modules\category\Views\index',$data);
	}

	public function create(){

		echo view('\Modules\category\Views\create');
	}

	public function store(){
        helper(['form']);
		$rules = [
            'name' => 'required',
        ];

		if($this->validate($rules)){
			$category = new ModelsCategory();
            $data = [
                'name' => $this->request->getVar('name'),
            ];
            $category->save($data);
			session()->setFlashdata('message', 'Added Successfully!');
			session()->setFlashdata('alert-class', 'alert-success');
			
			return redirect()->to(base_url('public/category'));
        }

	}

	public function edit($id = 0){

		## Select record by id
		$category = new ModelsCategory();
		$category = $category->find($id);
  
		$data['category'] = $category;
		return view('\Modules\category\Views\edit',$data);
  
	 }

	 public function update_category($id = 0){

		$request = service('request');
		$postData = $request->getPost();
		if(isset($postData['submit'])){
  
		  ## Validation
		  $input = $this->validate([
			'name' => 'required',
		  ]);
  
		  if (!$input) {

			 return redirect()->route('category/edit/'.$id)->withInput()->with('validation',$this->validator); 
		  } else {
  
			 $category = new ModelsCategory();
  
			 $data = [
				'name' => $postData['name'],
			 ];
  
			 ## Update record
			 if($category->update($id,$data)){
				session()->setFlashdata('message', 'Updated Successfully!');
				session()->setFlashdata('alert-class', 'alert-success');

				return redirect()->to(base_url('public/category'));
			}else{

				session()->setFlashdata('message', 'Data not saved!');
				session()->setFlashdata('alert-class', 'alert-danger');
  
				return redirect()->to(base_url('public/category'));
			}
  
		  }
		}
  
	 }

	 public function delete($id=0){

		$category = new ModelsCategory();
  
		## Check record
		if($category->find($id)){
  
		   ## Delete record
		   $category->delete($id);
  
		   session()->setFlashdata('message', 'Deleted Successfully!');
		   session()->setFlashdata('alert-class', 'alert-success');
		}else{
		   session()->setFlashdata('message', 'Record not found!');
		   session()->setFlashdata('alert-class', 'alert-danger');
		}
  
		return redirect()->to(base_url('public/category'));
  
	 }


}
