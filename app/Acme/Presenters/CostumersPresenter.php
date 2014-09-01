<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class CostumersPresenter extends Presenter {

    
    public function registerdate()
    {
        setlocale (LC_TIME, 'id_ID');
        return $this->register_at->formatLocalized('%d %B %Y');
    }

}