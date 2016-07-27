<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 6/27/2016
 * Time: 2:51 PM
 */

namespace App\DataAccess\CategoryDataAccess;
	

use App\Category;

class CategoryDataAccess
{
     protected $categoryDB;
    
    public function __construct (App\Category $cat)
    {
        $this->categoryDB = $cat;
    }

    /**
     * return a list of categories 25 records at a time
     * @return Collection of categories
     */

    public function GetAllCategories()
    {
		$result = categoryDB->Category::all();
		return $result;
    }

    /**
     * show details of a particular category
     * @param $name string name of category
     * @return mixed single Category
     */
    public function FindCategoryByName($name)
    {
      // $categoryName = Category::where('name',$name)->first();   
		//return view('productbycategoryResult',compact('categoryName'));
		echo 'You can find a category by name';
		
    }

    /**
     * Update Category, method accepts id of
     * model being targeted and a Request which is
     * an array of either $_GET or $_POST
     * @param $id integer id of category
     * @param $data array of values from form
     * @return mixed
     */

    public function UpdateCategory($id, $data)
    {
        $category = Category::find($id);
        return $category->update($data);
    }

    /**
     * Uses mass assignment protection of framework
     * so it accepts a Request array
     * @param array $data
     * @return static returns a Category Model
     */

    public function CreateCategory($data = array())
    {
        return Category::create($data);
    }


}