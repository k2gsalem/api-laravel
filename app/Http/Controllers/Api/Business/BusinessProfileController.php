<?php

namespace App\Http\Controllers\Api\Business;

use App\Entities\Business\BusinessProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessProfileController extends Controller
{

    protected $model;
    protected $client;
    // public function __construct(Client $client, Asset $model)
    // {
    //     $this->client = $client;
    //     $this->model = $model;
    // }
    public function __construct(BusinessProfile $model)
    {
        $this->model = $model;
        $this->middleware('permission:List business')->only('index','show');
        $this->middleware('permission:Create business')->only('store');
        $this->middleware('permission:Delete business')->only('destroy');
        $this->middleware('permission:Update business')->only('update');
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
            'message' => 'Business Profile Lists'
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
            'message' => 'Business Profile Create'
        ], 200);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Business\BusinessProfile  $businessProfile
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessProfile $businessProfile)
    {
        return response()->json([
            'success' => true,
            'message' => 'Business Profile show'
        ], 200);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Business\BusinessProfile  $businessProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessProfile $businessProfile)
    {

        return response()->json([
            'success' => true,
            'message' => 'Business Profile Update'
        ], 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Business\BusinessProfile  $businessProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessProfile $businessProfile)
    {
        return response()->json([
            'success' => true,
            'message' => 'Business Profile Delete'
        ], 200);
        //
    }
}
