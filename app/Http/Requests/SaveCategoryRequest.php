<?php

namespace App\Http\Requests;

use App\Model\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCategoryRequest extends FormRequest
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
        $rules =[
            'name' => ['required']
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['name'] = ['required', Rule::unique('categories')->ignore($this->category)];
        }

        return $rules;
    }

    public function createCategory()
    {
        return Category::create([
            'name'=> $this->name
        ]);
    }


    public function updateCategory($category)
    {
        $category->update($this->all());

        return $category;
    }
}
