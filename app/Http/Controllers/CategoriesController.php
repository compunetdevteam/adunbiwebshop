<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

//use App\Http\Requests;

class CategoriesController extends Controller
{
    protected $categoryDB;
	
	public function __construct (App\CategoryDataAccess $cat)
	{
		$this->categoryDB = $cat;
	}
	//method to get and display all Product Categories
	public function index()
	{
		 
		//$category = App\Category::all();
		$category = $this->categoryDB->GetAllCategories();
		//dd($category);
		return view('index', compact('category'));
		
	}
	
	
	//controller method to find category by Name
	public function findCategoryByName($name )
	{
		
		/*if(!$name || $name ===''){
			redirect('SomeErrorPage.php');//redirect to an error Page
			
		}else{*/
		$catName = $this->categoryDB->FindCategoryByName($name);
		return view('findCat',compact('catName'));
		//} end of the else statement
	}
	//Controller to update a product category
	public function updateCategory(App\CategoryDataAccess $id, $data )
	{
		$updateCat = $this->categoryDB->UpdateCategory($id, $data);
		return view();
	}
	
	
	public function createCategory(App\CategoryDataAccess $data)
	{
		$createCat = $this->categoryDB->createCategory($data);
		return view();
	}
	
	
	
	//method to create the product Category
	public function create()
	{
		
		echo 'create Product category on this page';
		return view('createCatByName');
	}
	
	public function createProductCategory(Request $request)
	{	
		$productcategory = $this->$request->input('name');
		
		if(!$productcategory || $productcategory ==='')
		{
				redirect('errorPage');//redirect to this page whenever there is an empty input 
		}else{
			return $productcategory;
		}
		
	}
	
	public function searchProductByCategory()
	{
		//getting an input from the users view and passing it to $viewproductbycategory
	/*
		Request $request, $name
	$viewproductbycategory = $this->$request->input('name');
		if(!$viewproductbycategory || $viewproductbycategory ==='')
		{
			redirect('page to redirect when an error occurs'); //the error page to send a user to
		}else{
			return $viewproductbycategory;
		}*/
		
		
		echo 'View the Product By Category on this page';
		return view('productbycategory');
		
	}
	
	
	/*
	* method to retrieve the search result
	*	@param 
	*/
	public function viewProductByCategory(Request $name)
	{
		$viewproductbycategory = $name->input('name');
		//if(!$viewproductbycategory || $viewproductbycategory ==='')
		//{
			//return view('productbycategory'); //the error page to send a user to
		//}
		
			//$this->categoryDB->FindCategoryByName($name) = $viewproductbycategory;
			//$viewproductbycategory = $this->categoryDB->FindCategoryByName('name');
		 
		return view('productbycategoryResult', compact('viewproductbycategory'));
		//dd($viewproductbycategory);
		//echo 'result of the search';
		//return view('productbycategoryResult')->with('viewproductbycategory');
		
			//r_dump($viewproductbycategory);
	}

	
	
}
