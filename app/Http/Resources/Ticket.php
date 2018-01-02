<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Ticket extends Resource
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

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request): array
    {
        return [
            'user' => $this->user,
            'category' => $this->category,
            'queue' => $this->queue,
            'technician' => $this->technicians
        ];
    }
}
