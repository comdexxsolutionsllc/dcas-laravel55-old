<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

/**
 * Class UserTransformer.
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the \User entity.
     *
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model): array
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'username' => $model->username,
            'email' => $model->email,
            'isAdmin' => ($model->is_admin == 0) ? 'false' : 'true',
            'isDisabled' => ($model->is_disabled == 0) ? 'false' : 'true',
            'isDeleted' => (is_null($model->deleted_at)) ? 'false' : 'true',
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
