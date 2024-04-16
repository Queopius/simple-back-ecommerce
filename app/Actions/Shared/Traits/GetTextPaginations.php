<?php

namespace App\Actions\Shared\Traits;

use Illuminate\Support\Str;

trait GetTextPaginations
{
    public function textPaginations($models, $countModel, $text)
    {
        return trans('View page'). ' ' .$this->currentAndLastPage($models). ' ' .trans('total of'). ' ' .$this->countModels($countModel, $text);
    }

    protected function currentAndLastPage($models)
    {
        return $models->currentPage(). ' ' .trans('of'). ' ' .$models->lastPage();
    }

    protected function countModels($countModel, $text)
    {
        return $countModel . ' ' . Str::plural($text, 2);
    }
}
