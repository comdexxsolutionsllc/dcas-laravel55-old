<?php

namespace App\Http\Controllers;

use Bekusc\Validation\Traits\AutoValidation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mpociot\Reanimate\ReanimateModels;


class Controller extends BaseController
{
    use AuthorizesRequests, AutoValidation, DispatchesJobs, ReanimateModels, ValidatesRequests;
}
