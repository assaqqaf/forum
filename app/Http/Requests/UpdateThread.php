<?php

namespace Forum\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Forum\Thread;

class UpdateThread extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $thread = $this->route('thread');

        return $thread && $this->user()->can('update', $thread);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:17',
            'body' => 'required',
        ];
    }
}
