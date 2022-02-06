<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionItemInfo extends Model
{
    use HasFactory;
    public static function saveRequisitionItemInfo($requisitionDetails)
    {
        RequisitionItemInfo::insert($requisitionDetails);
    }
}
