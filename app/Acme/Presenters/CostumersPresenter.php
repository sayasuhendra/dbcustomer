<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class CostumersPresenter extends Presenter {

    
    public function registerdate()
    {
        $date = date_create($this->register_at);
        setlocale (LC_TIME, 'id_ID');
        return date_format($date, 'd M Y');
    }

}