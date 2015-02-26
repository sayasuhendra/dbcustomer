<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class CircuitsPresenter extends Presenter {

    public function mrcCircuit()
    {
        
        if ( ! isset($this->biayas->mrc) || $this->biayas->mrc == '') {
            return 'kosong';
        } else {
            
            $jadi = number_format($this->biayas->mrc ,2,',','.') . " " . $this->biayas->currency ;
            return $jadi;
        }
    }

    public function nrcCircuit()
    {
        
        if ( ! isset($this->biayas->nrc) || $this->biayas->nrc == '') {
            return 'kosong';
        } else {
            
            $jadi = number_format($this->biayas->nrc ,2,',','.') . " " . $this->biayas->currency ;
            return $jadi;
        }
    }

    public function mrclastmile()
    {
        // $biayalastmile = Biayalastmilevendor::where('circuitidlastmile', $costumercircuit->circuitidlastmile)->first();
        // $jadi = number_format($biayalastmile->mrc ,2,',','.') . " " . $biayalastmile->currency ;

        // return $jadi;


        if ( ! isset($this->biayavendors->mrc) || $this->biayavendors->mrc == '' ) {

            return 'kosong';

        
        } else {

            $jadi = number_format($this->biayavendors->mrc ,2,',','.') . " " . $this->biayavendors->currency ;
            return $jadi;

        }
    }

    public function untung()
    {
        if (!empty($this->biayavendors->mrc) && !empty($this->biayas->mrc) && !empty($this->biayavendors->currency)) {
            
        $untung = $this->biayas->mrc - $this->biayavendors->mrc;
        $jadi = number_format($untung ,2,',','.') . " " . $this->biayavendors->currency ;     
        return $jadi;

        } else {
            return "Invalid";
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

    public function dateOfContract()
    {
        
        if (isset($this->doc) || $this->doc === null) {

            return 'Kosong';

        } else {

            $date = date_create($this->doc);

            setlocale (LC_TIME, 'id_ID');
            return date_format($date, 'd M Y');
                        
        }
        
    }
}