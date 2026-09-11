<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "CategoryController@index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "CategoryController@create";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "CategoryController@edit, id: {$id}";
    }
}
