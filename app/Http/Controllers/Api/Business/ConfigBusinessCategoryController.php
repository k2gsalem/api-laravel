<?php

namespace App\Http\Controllers\Api\Business;

use App\Entities\Business\ConfigBusinessCategory;
use App\Http\Controllers\Controller;
use ConfigBusinessCategorySeeder;
use Illuminate\Http\Request;

class ConfigBusinessCategoryController extends Controller
{

    protected $model;
    protected $client;
    // public function __construct(Client $client, Asset $model)
    // {
    //     $this->client = $client;
    //     $this->model = $model;
    // }
    public function __construct(ConfigBusinessCategorySeeder $model)
    {
        $this->model = $model;
        $this->middleware('permission:List business category')->only('index','show');
        $this->middleware('permission:Create business category')->only('store');
        $this->middleware('permission:Delete business category')->only('destroy');
        $this->middleware('permission:Update business category')->only('update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json([
            'success' => true,
            'message' => 'Business Category Lists'
        ], 200);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Business Category store'
        ], 200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Business\ConfigBusinessCategory  $configBusinessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigBusinessCategory $configBusinessCategory)
    {
        return response()->json([
            'success' => true,
            'message' => 'Business Category Show'
        ], 200);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Business\ConfigBusinessCategory  $configBusinessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigBusinessCategory $configBusinessCategory)
    {
        return response()->json([
            'success' => true,
            'message' => 'Business Category Update'
        ], 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Business\ConfigBusinessCategory  $configBusinessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigBusinessCategory $configBusinessCategory)
    {
        return response()->json([
            'success' => true,
            'message' => 'Business Category Destroy'
        ], 200);
        //
    }
}
