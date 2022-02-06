<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisitionList extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "page_number"                => "required",
            "no_of_records"              => "required",
            "filters"                    => "required|array",
            "filters.requisition_number" => "integer|nullable",
            "filters.intentor"           => "string|nullable",
            "filters.consignee"          => "string|nullable",
            "filters.consignee_code"     => "string|nullable",
            "filters.date"               => "string|nullable"
        ];
    }
}
