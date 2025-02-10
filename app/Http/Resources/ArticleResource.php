<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Article $article */
        $article = $this->resource;

        return [
            'title' => $article->title,
            'slug' => $article->slug,
            'content' => $article->content,
            'sort' => $article->sort,
        ];
    }

    public function with(Request $request): array
    {
        return [
            'meta' => 'test'
        ];
    }
}
