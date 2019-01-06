<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        //バリデーションの設定でtitleに3文字以上かつbodyに文字が含まれているか調べ、なければerrorsにエラーメッセージが格納
        return [
            //
            'title' => 'required|min:3',
            'body' => 'required'
        ];
    }

    public function messages() {
        return [
          'title.required' => 'please enter title!!!'
        ];
    }
}
