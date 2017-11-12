<?php

namespace App\Presenters;

use App\Transformers\ConsumerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConsumerPresenter
 *
 * @package namespace App\Presenters;
 */
class ConsumerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConsumerTransformer();
    }
}
