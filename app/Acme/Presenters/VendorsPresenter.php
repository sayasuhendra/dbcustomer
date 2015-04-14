<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class VendorsPresenter extends Presenter {

    public function mrc()
    {
        
        if ( ! isset($this->backhauls->biayas->mrc) || $this->backhauls->biayas->mrc == '') {

            return 'kosong';

        } else {
            
            $jadi = number_format($this->backhauls->biayas->mrc ,2,',','.') . " " . $this->backhauls->biayas->currency ;
            return $jadi;

        }
        
    }

    public function nrc()
    {
        
        if ( ! isset($this->backhauls->biayas->nrc) || $this->backhauls->biayas->nrc == '') {

            return 'kosong';

        } else {
            
            $jadi = number_format($this->backhauls->biayas->nrc ,2,',','.') . " " . $this->backhauls->biayas->currency ;

            return $jadi;
        }
    }

    public function startDate()
    {
        
        if (isset($this->activated_at) || $this->activated_at === null) {

            return 'Kosong';

        } else {
            
            $date = date_create($this->activated_at);

            setlocale (LC_TIME, 'id_ID');
            return date_format($date, 'd/m/y');                        
        }
        
    }

    public function startDateShow()
    {
        
        if (isset($this->activated_at) || $this->activated_at === null) {

            return 'Kosong';

        } else {

            $date = date_create($this->activated_at);

            setlocale (LC_TIME, 'id_ID');
            return date_format($date, 'd M Y');
                        
        }
        
    }

}