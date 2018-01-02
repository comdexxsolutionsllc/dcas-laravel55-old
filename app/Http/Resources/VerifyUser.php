<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class VerifyUser extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
