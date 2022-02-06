<?php

namespace App\Services;

use App\Models\RequisitionData;
use App\Models\RequisitionItemInfo;

class RequisitionServes
{
   public static function requisitionRequest($userRequest)
   {
      $requisitionId =  RequisitionData::saveRequisition($userRequest['requisition']);

      $requisitionItemsInfo = [];

      foreach ($userRequest['iteam'] as $key => $value) {
         $requisitionItemsInfo[] = [
            "requisition_id" => $requisitionId,
            "module"         => "requisition",
            "sub_module"     => "description",
            "key"            => "items",
            "value"          => $value
         ];
      }

      foreach ($userRequest['conumption_during_past_three_years'] as $key => $value) {
         $requisitionItemsInfo[] = [
            "requisition_id" => $requisitionId,
            "module"         => "requisition",
            "sub_module"     => "conumption_during_past_three_years",
            "key"            => $key,
            "value"          => $value
         ];
      }

      foreach ($userRequest['details_of_outstanding_indent'] as $key => $value) {
         $requisitionItemsInfo[] = [
            "requisition_id" => $requisitionId,
            "module"         => "requisition",
            "sub_module"     => "details_of_outstanding_indent",
            "key"            => "details_of_outstanding_indent",
            "value"          => $value
         ];
      }

      foreach ($userRequest['likely_supplier'] as $key => $value) {
         $requisitionItemsInfo[] = [
            "requisition_id" => $requisitionId,
            "module"         => "requisition",
            "sub_module"     => "likely_supplier",
            "key"            => "likely_supplier",
            "value"          => $value
         ];
      }

      foreach ($userRequest['adequate'] as $key => $value) {
         $requisitionItemsInfo[] = [
            "requisition_id" => $requisitionId,
            "module"         => "requisition",
            "sub_module"     => "adequate",
            "key"            => $key,
            "value"          => $value
         ];
      }

      foreach ($userRequest['indented_here'] as $key => $value) {
         $requisitionItemsInfo[] = [
            "requisition_id" => $requisitionId,
            "module"         => "requisition",
            "sub_module"     => "indented_here",
            "key"            => $key,
            "value"          => $value
         ];
      }

      foreach ($userRequest['feeding_depot_only'] as $key => $value) {
         $requisitionItemsInfo[] = [
            "requisition_id" => $requisitionId,
            "module"         => "requisition",
            "sub_module"     => "feeding_depot_only",
            "key"            => $key,
            "value"          => $value
         ];
      }
      RequisitionItemInfo::saveRequisitionItemInfo($requisitionItemsInfo);
   }

   public static function requisitionList($userRequest)
   {
      $requisitionList =  RequisitionData::requisitionList($userRequest);
      return $requisitionList;
   }
}
