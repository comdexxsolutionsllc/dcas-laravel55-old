<?php

namespace App\Presenters;

use App\Transformers\NewsItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NewsItemPresenter
 *
 * @package namespace App\Presenters;
 */
class NewsItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NewsItemTransformer();
    }
}
