<?php

namespace App\Http\Controllers;
use App\Category;																																																																																																										

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests;
use Session;

class CategoriesController extends Controller
{
	//method to get and display all Product Categories
	public function index()
	{ 
		$category = $this->GetAllCategories();
		return view('categories.index', compact('category'));	
	}

	/**
	 * Load the View with the search form
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function search()
	{
		return view('categories.searchcategory');
	}


	/**
	 * Search for a Category by name
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function doSearch(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|min:3|alpha_dash'
		]);

		$results = $this->catsearch($request);
		return view('categories.searchresults', compact('results'));
	}


	/**
	 * Show page to create a new Category
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function create()
	{
		return view('categories.createpage');
	}

	/**
	 * Save a new Category
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
		dd($create);
		$create->save();
		return redirect()->action('CategoriesController@index');
	}

	/**
	 * Show view to update a Category
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function updatepage(Request $request, $id)
	{
		$result = Category::find($id);
		return view('categories.updatepage', compact('result'));
		
	}

	/**
	 * Update the Category
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request)
	{
        $update = Category::where('id','=',$request->input('id'))->update(['name'=> $request->input('name'),
			'description'=>$request->input('description')
		]);
		Session::flash('message','Updating the record was successful');
		return redirect()->action('CategoriesController@index');
	}
	/*
	 * Method to delete the category
	 */
	public function delete($id)
	{
		$deleteCategory = Category::where('id','=',$id)->delete($id);
		Session::flash('message','Deleting the record was Successful');
		return redirect()->action('CategoriesController@index');
	}

	/*//////////////////////////////////////////////////////////////////////
	*Data_Access Methods
	*///////////////////////////////////////////////////////////////////////

	/**
	 * @return Collection|static[]
     */
	public function GetAllCategories()
    {
		$result = Category::all();
		return $result;
    }

	
	
}
