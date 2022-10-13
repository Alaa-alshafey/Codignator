<?php namespace Modules\income\Controllers;

use App\Controllers\BaseController;
use Modules\category\Models\Category;
use Modules\income\Models\Income;

class IncomeController extends BaseController
{

	public function __construct()
	{
		$this->Modelsincome = new Income();
		$this->ModelsCategory = new Category();
	} 
	public function index()
	{
		
		$incomes = new \Modules\income\Models\Income;
		$cat = new \Modules\category\Models\Category();
		$pager = \Config\Services::pager();

		if(!empty($this->request->getGet('search_notes')) || $this->request->getGet('search_notes')){

			$notes = $this->request->getGet('search_notes');
			$data = [
				'incomes' => $incomes->like('notes',$notes)->paginate(3),
				'pager' => $incomes->pager
			];


			
		}elseif(!empty($this->request->getGet('category')) || $this->request->getGet('category')){
			

			$category = $this->request->getGet('category');
			$cat_id = $cat->like('name',$category)->first();
			$data = [
				'incomes' => $incomes->like('cat_id',$cat_id['id'])->paginate(3),
				'pager' => $incomes->pager
			];

		}elseif($this->request->getGet('amount')){

			$amount = $this->request->getGet('amount');
			$data = [
				'incomes' => $incomes->like('amount',$amount)->paginate(3),
				'pager' => $incomes->pager
			];

		}
		elseif(!empty($this->request->getGet('from')) ||$this->request->getGet('from')){

			$from = $this->request->getGet('from');
			$data = [
				'incomes' => $incomes->where('date =',$from)->paginate(3),
				'pager' => $incomes->pager
			];


		}else{
			$data = [
				'incomes' => $incomes->paginate(3),
				'pager' => $incomes->pager,
			];
			



		}
		echo view('\Modules\income\Views\index',$data);


	}

	public function create(){

		$categories = $this->ModelsCategory->findAll();

		$data = [
			'categories' => $categories,
		];
		echo view('\Modules\income\Views\create',$data);

	}
	public function store(){
		
        helper(['form']);
		$rules = [
            'notes' => 'required',
        ];

		if($this->validate($rules)){
			$incomes = new Income();
            $data = [
                'notes' => $this->request->getVar('notes'),
                'cat_id' => $this->request->getVar('cat_id'),
                'amount' => $this->request->getVar('amount'),
                'date' => $this->request->getVar('date'),
            ];
            $incomes->save($data);
			session()->setFlashdata('message', 'Added Successfully!');
			session()->setFlashdata('alert-class', 'alert-success');
			
			return redirect()->to(base_url('public/incomes'));
        }

	}
	public function edit($id = 0){

		## Select record by id
		$incomes = new Income();
		$incomes = $incomes->find($id);
		$categories = $this->ModelsCategory->findAll();

		$data = [
			'categories' => $categories,
		];

		$data['incomes'] = $incomes;
		return view('\Modules\income\Views\edit',$data);
  
	 }

	 public function update($id = 0){

	$request = service('request');
	$postData = $request->getPost();
	if(isset($postData['submit'])){

	  ## Validation
	  $input = $this->validate([
		'notes' => 'required',
	]);

	  if (!$input) {

		 return redirect()->route('incomes/edit/'.$id)->withInput()->with('validation',$this->validator); 
	  } else {

		 $income = new Income();

		 $data = [
			'notes' => $postData['notes'],
			'cat_id' => $postData['cat_id'],
			'amount' => $postData['amount'],
			'date' => $postData['date'],
		 ];

		 ## Update record
		 if($income->update($id,$data)){
			session()->setFlashdata('message', 'Updated Successfully!');
			session()->setFlashdata('alert-class', 'alert-success');

			return redirect()->to(base_url('public/incomes'));
		}else{

			session()->setFlashdata('message', 'Data not saved!');
			session()->setFlashdata('alert-class', 'alert-danger');

			return redirect()->to(base_url('public/incomes'));
		}

	  }
	}


 }
	 
 public function delete($id=0){

	$income = new Income();

	## Check record
	if($income->find($id)){

	   ## Delete record
	   $income->delete($id);

	   session()->setFlashdata('message', 'Deleted Successfully!');
	   session()->setFlashdata('alert-class', 'alert-success');
	}else{
	   session()->setFlashdata('message', 'Record not found!');
	   session()->setFlashdata('alert-class', 'alert-danger');
	}

	return redirect()->to(base_url('public/incomes'));

 }

}
