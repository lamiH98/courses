<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'title'             => 'required',
            'title_ar'          => 'required',
            'note'              => 'required',
            'note_ar'           => 'required',
            'mark'              => 'required',
            'option_1'          => 'required',
            'option_2'          => 'required',
            'option_3'          => 'required',
            'option_4'          => 'required',
            'option_1_ar'       => 'required',
            'option_2_ar'       => 'required',
            'option_3_ar'       => 'required',
            'option_4_ar'       => 'required',
            'right_answer'      => 'required',
            'right_answer_ar'   => 'required'
        ];
    }
}
