<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Profile extends Resource
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
            'user' => \App\User::find($this->user_id),
            'avatar' => $this->avatar,
            'biography' => $this->biography,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'postal_code' => $this->postal_code
        ];
    }
}
