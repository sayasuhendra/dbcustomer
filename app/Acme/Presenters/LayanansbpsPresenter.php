<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class LayanansbpsPresenter extends Presenter {

    
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

    public function mrcCircuit()
    {
        
        if ( ! isset($this->mrc) || $this->mrc == '') {
            return 'kosong';
        } else {
            
            $jadi = number_format($this->mrc ,2,',','.') . " " . $this->currency ;
            return $jadi;
        }
    }

    public function nrcCircuit()
    {
        
        if ( ! isset($this->nrc) || $this->nrc == '') {
            return 'kosong';
        } else {
            
            $jadi = number_format($this->nrc ,2,',','.') . " " . $this->currency ;
            return $jadi;
        }
    }

}