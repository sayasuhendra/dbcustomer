<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class BackhaulsPresenter extends Presenter {

    public function mrc()
    {
        
        if ( ! isset($this->biayas->mrc) || $this->biayas->mrc == '') {

            return 'kosong';

        } else {
            
            $jadi = number_format($this->biayas->mrc ,2,',','.') . " " . $this->biayas->currency ;
            return $jadi;

        }
        
    }

    public function nrc()
    {
        
        if ( ! isset($this->biayas->nrc) || $this->biayas->nrc == '') {

            return 'kosong';

        } else {
            
            $jadi = number_format($this->biayas->nrc ,2,',','.') . " " . $this->biayas->currency ;
            return $jadi;
        }
    }

    public function startDate()
    {
        
        if (isset($this->activated_at) || $this->activated_at === null) {

            return 'Kosong';

        } else {
            
            return $this->activated_at->format('d/m/y');
                        
        }
        
    }

    public function startDateShow()
    {
        
        if (isset($this->activated_at) || $this->activated_at === null) {

            return 'Kosong';

        } else {

            setlocale (LC_TIME, 'id_ID');
            return $this->activated_at->formatLocalized('%d %B %Y');
                        
        }
        
    }

}