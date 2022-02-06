<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Services\RequisitionServes;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequisitionList;

class RequisitionController extends Controller
{
    public static function requisitionRequest(Request $request)
    {
        $userRequest = $request->all();
        RequisitionServes::requisitionRequest($userRequest);
        return ['success' => true, 'message' => 'Success', 'code' => 200];
    }

    public static function getRequisitionList(RequisitionList $request)
    {
        //...
        $userRequest = $request->all();
        $requisitionList =  RequisitionServes::requisitionList($userRequest);
        return ['success' => true, 'message' => 'Success', 'code' => 200, "data" => $requisitionList];
        //...
    }
}
