<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ActionLog extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'route' => $this->route,
            'method' => $this->method,
            'action' => $this->action,
            'timestamp' => $this->created_at
        ];
    }
}
