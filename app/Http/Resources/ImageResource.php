<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'path' => asset('storage/' . $this->path),
          'width' => getimagesize(Storage::get('public/'.$this->path))[0],
          'height' => getimagesize(Storage::get('public/'.$this->path))[1]
        ];
    }
}
