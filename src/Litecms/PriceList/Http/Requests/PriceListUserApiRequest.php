<?php

namespace Litecms\PriceList\Http\Requests;

use App\Http\Requests\Request as FormRequest;
use Illuminate\Http\Request;

class PriceListUserApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $pricelist = $this->route('pricelist');
        if (is_null($pricelist)) {
            // Determine if the user is authorized to access pricelist module,
            return $request->user('api')->canDo('pricelist.pricelist.view');
        }

        if ($request->isMethod('POST') || $request->is('*/create')) {
            // Determine if the user is authorized to create an entry,
            return $request->user('api')->can('create', $pricelist);
        }

        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/edit')) {
            // Determine if the user is authorized to update an entry,
            return $request->user('api')->can('update', $pricelist);
        }

        if ($request->isMethod('DELETE')) {
            // Determine if the user is authorized to delete an entry,
            return $request->user('api')->can('delete', $pricelist);
        }

        // Determine if the user is authorized to view the module.
        return $request->user('api')->can('view', $pricelist);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->isMethod('POST')) {
            // validation rule for create request.
            return [
                
            ];
        }
        
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            // Validation rule for update request.
            return [
                
            ];
        }

        // Default validation rule.
        return [

        ];
    }
}
