<?php

namespace DCAS\Observers;

use App\UUIDModel;
use DCAS\Helpers\ModelHelper;

/**
 * Class UUIDModelObserver
 *
 * @package App\Observers
 */
final class UUIDModelObserver
{
    /**
     * @param UUIDModel $model
     *
     * @return null
     */
    public function creating(UUIDModel $model)
    {
        $model->{$model->getKeyName()} = ModelHelper::generateUuid();

        return null;
    }
}
