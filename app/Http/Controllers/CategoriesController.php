<?php

namespace App\Http\Controllers;
use App\Category;																																																																																																										

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;

class CategoriesController extends Controller
{
    protected $categoryDB;
    
    public function __construct (Category $cat)
    {
        $this->categoryDB = $cat;
    }
	//method to get and display all Product Categories
	public function index()
	{ 
		$category = $this->GetAllCategories();
		return view('categories.index', compact('category'));	
	}

	public function search()
	{
		return view('categories.searchcategory');
	}
	 


	public function doSearch(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|min:3|alpha_dash'
		]);

		$results = $this->catsearch($request);
		return view('categories.searchresults', compact('results'));
	}
/**
 * method to display the the create category page
 */
	public function create()
	{
		$result = DB::table('stocks')->join('categories','stocks.id','=','categories.stock_id')
			->select('categories.name','stock_id')->pluck('name','stock_id');
		$stocks = new Collection($result);
		return view('categories.createcategory',compact('stocks'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function save(Request $request)
	{
		dd($request);
		$this->validate([
			'name'=>'requird',
			'description'=>'required',
		]);
		$create = new Category;

		$create->name = $request->input('name');
		$create->description = $request->input('description');
		$create->stock_id = $request->input('stockID');
		dd($create);
		$create->save();
		return redirect()->action('CategoriesController@index');
	}

	/*//////////////////////////////////////////////////////////////////////
	*Data_Access Methods
	*
	*
	*///////////////////////////////////////////////////////////////////////



 public function GetAllCategories()
    {
		$result = Category::all();
		return $result;
    }

    /**
     * show details of a particular category
     * @param $name string name of category
     * @return mixed single Category
     */
    public function FindCategoryByName()
    {
		
    	//$searchresult = $request->input()->where('id')->get();
      // $categoryName = Category::where('name',$name)->first();   
		//return view('producr4tbycategoryResult',compact('categoryName'));
		echo 'You can find a category by name';
		return view('Categories.searchcategory');
    }

    public function catsearch(Request $request)
    {
    	$results = Category::where('name', 'like', $request->input('name').'%')->pluck('name');
    	return $results;
    }
/*
    public function SearchCategoryWithProducts(Request $request)
    {
    	$result = Category::with('products')->where('name',$request->input('name'))->get();
    	return $result;
    }

*/


	
	/***
	//controller method to find category by Name
	public function findCategoryByName($name )
	{
		
		/*if(!$name || $name ===''){
			redirect('SomeErrorPage.php');//redirect to an error Page
			
		}else{
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
		}
		
		
		echo 'View the Product By Category on this page';
		return view('productbycategory');
		
	}
	
	
	/*
	* method to retrieve the search result
	*	@param 
	
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
*/
	
	
}
