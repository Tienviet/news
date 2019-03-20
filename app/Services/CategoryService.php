<?php
/**
 * Created by PhpStorm.
 * User: tienviet
 * Date: 3/20/19
 * Time: 3:46 PM
 */

namespace App\Services;


use App\Category;

class CategoryService
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCate(){
        return $this->category->all();
    }

}
