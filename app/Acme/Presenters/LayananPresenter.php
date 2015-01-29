<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class LayanansbpsPresenter extends Presenter {

    
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

    public function mrc()
    {
        
        if ( ! isset($this->mrc) || $this->mrc == '') {
            return 'kosong';
        } else {
            
            $jadi = number_format($this->mrc ,2,',','.') . " " . $this->currency ;
            return $jadi;
        }
    }

    public function nrc()
    {
        
        if ( ! isset($this->nrc) || $this->nrc == '') {
            return 'kosong';
        } else {
            
            $jadi = number_format($this->nrc ,2,',','.') . " " . $this->currency ;
            return $jadi;
        }
    }

}