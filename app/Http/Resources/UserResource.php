<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\RsaEncryptionService;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $rsaService = new RsaEncryptionService();
        $encryptedName = $rsaService->encrypt($this->name);
        return [
            "id"                => $this->id,
            "name"              => $encryptedName,
            "email"             => $this->email,
            "mobile"            => $this->mobile,
            "user_type"         => $this->user_type,
            "created_at"        => $this->created_at,
        ];
    }
}
