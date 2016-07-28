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