<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class commentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"                => $this->id,
            "user_id"           => $this->user_id,
            "user_name"         => $this->User->name,
            "blog_id"           => $this->blog_id,
            "blog_title"        => $this->Blog->title,
            "description"       => $this->description,
            "is_read"           => ($this->is_read == 0 ? 'خوانده نشده' : 'خوانده شده'),
            "status"            => ($this->status == 0 ? 'درحال بررسی' : ($this->status == 1 ? 'تایید شده' : ($this->status == 2 ? 'تایید نشده' : 'نامشخص'))),
        ];
    }
}
