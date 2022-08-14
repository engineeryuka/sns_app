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
        // ユーザー管理をして機能の制限をしたいときに使う
        // 変更 岡本由
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // バリデーションのルールを書く

        return [
            'body' => 'required|max:140',
        ];
    }

    // 追加 岡本由
    public function messages()
    {
        return [
            'body.required' => '投稿内容は必須です',
            'body.max' => ':max文字以内で入力してください',
        ];
    }
}
