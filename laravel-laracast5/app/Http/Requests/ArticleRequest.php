<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$requestMethod = $this->method();
        //we could conceivably do rules that do additional stuff depending on the request method (e.g: one for updates, one for create). but for now, we won't

        $rules = [
            "title" => "required|min:3",
            "body" => "required",
            "published_at" => "required|date"
        ];

        return $rules;
    }
}
