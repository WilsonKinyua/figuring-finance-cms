<?php

namespace App\Http\Requests;

use App\Models\ArticleCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArticleCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('article_category_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:article_categories,name',
            ],
        ];
    }
}
