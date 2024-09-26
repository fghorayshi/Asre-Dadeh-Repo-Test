<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            "id"                => $this->id,
            "title"             => $this->title,
            "user_id"           => $this->user_id,
            "user_name"         => $this->User->name,
            "blog_category_id"  => $this->blog_category_id,
            "blog_category_name"    => $this->BlogCategory->title,
            "description"       => $this->description,
            "slug"              => $this->slug,
            "status"            => $this->status,
        ];
    }
}
