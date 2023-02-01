<?php

namespace App\Http\Requests;

use App\Models\Article;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArticleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('article_create'),
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
            'title' => [
                'string',
                'required',
                'unique:articles,title',
            ],
            'category_id' => [
                'integer',
                'exists:article_categories,id',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
        ];
    }
}
