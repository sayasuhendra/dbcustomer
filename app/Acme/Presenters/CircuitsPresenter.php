<?php namespace Acme\Presenters;

use Laracasts\Presenter\Presenter;

class CircuitsPresenter extends Presenter {

    public function mrcCircuit()
    {
        if ( $this->biayas->mrc !== '' ) {
        $jadi = number_format($this->biayas->mrc ,2,',','.') . " " . $this->biayas->currency ;
        return $jadi;
        } else {
            return 'kosong';
        }
    }

    public function nrcCircuit()
    {
        if ( $this->biayas->nrc !== '' ) {
        $jadi = number_format($this->biayas->nrc ,2,',','.') . " " . $this->biayas->currency ;
        return $jadi;
        } else {
            return 'kosong';
        }
    }

    public function mrclastmile()
    {
        // $biayalastmile = Biayalastmilevendor::where('circuitidlastmile', $costumercircuit->circuitidlastmile)->first();
        // $jadi = number_format($biayalastmile->mrc ,2,',','.') . " " . $biayalastmile->currency ;

        // return $jadi;


        if ( $this->biayavendors->mrc !== '' ) {
        $jadi = number_format($this->biayavendors->mrc ,2,',','.') . " " . $this->biayavendors->currency ;
        return $jadi;
        } else {
            return 'kosong';
        }
    }

    public function untung()
    {
        if ( $this->mrcvendor !== '' and $this->biayas->mrc !== '') {
        $untung = $this->biayas->mrc - $this->biayavendors->mrc;
        $jadi = number_format($untung ,2,',','.') . " " . $this->biayavendors->currency ;     
        return $jadi;
        } else {
            return 'kosong';
        }
    }

    public function startDate()
    {
        // setlocale (LC_TIME, 'id_ID');
        // return $this->activated_at->formatLocalized('%d %B %Y');
        return $this->activated_at->format('d/m/y');
    }

}