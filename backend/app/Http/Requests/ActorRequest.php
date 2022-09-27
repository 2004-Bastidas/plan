<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name" => "required|alpha",
            "last_name" => "required|alpha"
        ];
    }

    protected function failedValidation(Validator $v){
        //lanzar una exepcion 
        throw new HttpResponseException( response()->json([
                                                                "success" => false,
                                                                "errors" => $v->errors()
                                                            ] , 422 ) );
    }
}
