<?php

namespace App\Presenters;

use App\Transformers\TicketTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TicketPresenter.
 */
class TicketPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TicketTransformer();
    }
}
