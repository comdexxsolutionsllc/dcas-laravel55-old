<?php

namespace App\Presenters;

use App\Transformers\NewsItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NewsItemPresenter.
 */
class NewsItemPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NewsItemTransformer();
    }
}
