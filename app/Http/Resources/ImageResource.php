<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $imageData = Image::read('storage/' . $this->path);

        return [
          'path' => asset('storage/' . $this->path),
           'width' => $imageData->width(),
           'height' => $imageData->height(),
        ];
    }
}
