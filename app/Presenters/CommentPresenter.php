<?php

namespace App\Presenters;

use App\Transformers\CommentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CommentPresenter.
 */
class CommentPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CommentTransformer();
    }
}
