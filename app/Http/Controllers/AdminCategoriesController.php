<?php

namespace FRD\Http\Controllers;

use FRD\Category;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $categories;

    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->all();

        return view('categories', compact('categories'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {

    }

    /**
     * Update category.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Delete category.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function delete(Request $request, $id)
    {

    }
}
