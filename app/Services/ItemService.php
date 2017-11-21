<?php

namespace App\Services;

class ItemService
{
    /**
     * @var array
     */
    protected $pagination = [
        'per_page' => 20,
        'prev' => 2,
        'next' => 4,
        'first' => 1,
        'last' => 5,
    ];

    /**
     * @param $data
     * @param $pagination
     *
     * @return array
     */
    public function getItems($data, $pagination): array
    {
        return [
            'data' => $data,
            'pagination' => ($pagination) ? $pagination :
                    ['per_page' => 20, 'prev' => 2, 'next' => 4, 'first' => 1, 'last' => 5],
        ];
    }
}
