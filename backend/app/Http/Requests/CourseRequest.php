<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|max:30|min:10",
            "description" => "required|min:10",
            "weeks"  => "digits:1",
            "enroll_cost" => "required|numeric",
            "minimum_skill" => "in:Beginner,Intermediate,Advanced,Expert"
        ];
    }
    /**
     * 
     */
    protected function failedValidation(Validator $v){
        //lanzar una exepcion 
        throw new HttpResponseException( response()->json([
                                                                "success" => false,
                                                                "errors" => $v->errors()
                                                            ] , 422 ) );
    }
}
