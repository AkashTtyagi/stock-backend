<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionData extends Model
{
    use HasFactory;

    public static function ScoperequisitionFilters($query, $request)
    {
        //...
        if (!empty($request['filters'])) {
            if (!empty($request['filters']['requisition_number'])) {
                $query = $query->where('requisition_number', $request['filters']['requisition_number']);
            }
            if (!empty($request['filters']['intentor'])) {
                $query = $query->where('intentor', $request['filters']['intentor']);
            }
            if (!empty($request['filters']['consignee'])) {
                $query = $query->where('consignee', $request['filters']['consignee']);
            }
            if (!empty($request['filters']['consignee_code'])) {
                $query = $query->where('consignee_code', $request['filters']['consignee_code']);
            }
            if (!empty($request['filters']['date'])) {
                $date = parseDateFormat($request['filters']['date']);
                $query = $query->whereRaw("cast(date as date) = '$date'");
            }
        }
    }

    public static function saveRequisition($userRequest)
    {
        //...
        return RequisitionData::insertGetId($userRequest);
        //...
    }

    public static function requisitionList($userRequest)
    {
        $current_page = $userRequest['page_number'];
        $limit  = $userRequest['no_of_records'];
        $offset = ($current_page * $limit) - $limit;
       return RequisitionData::requisitionFilters($userRequest)->offset($offset)->limit($limit)->get();
    }
}
