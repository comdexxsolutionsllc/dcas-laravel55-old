<?php

namespace DCAS\Observers;

use App\Consumer;
use DCAS\Helpers\ModelHelper;

/**
 * Class ConsumerObserver
 *
 * @package App\Observers
 */
class ConsumerModelObserver
{
    /**
     * @param Consumer $model
     *
     * @return null
     */
    public function created(Consumer $model)
    {
        $model->{$model->getApiTokenKey()} = ModelHelper::generateApiToken($model);

        return null;
    }
}
