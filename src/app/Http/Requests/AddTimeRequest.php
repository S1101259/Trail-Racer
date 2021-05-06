<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTimeRequest extends FormRequest
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
            "competition" => "required|exists:competitions,slug",
            "minutes" => "required|numeric",
            "seconds" => "required|numeric",
            "milliseconds" => "required|numeric",
            "teamId" => "required|exists:teams,id",
            "circuitId" => "required|exists:circuits,id"
        ];
    }
}
