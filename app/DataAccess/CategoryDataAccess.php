<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 6/27/2016
 * Time: 2:51 PM
 */

namespace App;


use App\Category;

class CategoryDataAccess
{
    public $category;

    /**
     * CategoryDataAccess constructor.
     * @param \App\Category $_category
     */
    public function __construct(Category $_category)
    {
        $this->category = $_category;
    }

    /**
     * return a list of categories 25 records at a time
     * @return Collection of categories
     */

    public function GetAllCategories()
    {
        Category::chunk(25, function($categories){
            return $categories;
        });
    }

    /**
     * show details of a particular category
     * @param $name string name of category
     * @return mixed single Category
     */
    public function FindCategoryByName($name)
    {
        return Category::where('name',$name)->first();
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