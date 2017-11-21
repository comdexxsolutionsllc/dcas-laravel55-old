<?php

namespace App\Presenters;

use App\Transformers\ConsumerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConsumerPresenter.
 */
class ConsumerPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConsumerTransformer();
    }
}
