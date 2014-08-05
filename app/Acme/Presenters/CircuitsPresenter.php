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

    public function mrcVendor()
    {
        $jadi = number_format($this->biayavendors['0']->mrc ,2,',','.') . " " . $this->biayavendors['0']->currency ;         
        return $jadi;
    }

    public function lamaBerlangganan()
    {
        setlocale (LC_TIME, 'id_ID');
        return $this->activated_at->formatLocalized('%d %B %Y');
    }

    public function namavendor()
    {
        $namavendor = \DB::table('vendors')->where('id', $this->lastmiles->vendor_id)->pluck('nama');
        return $namavendor ;
    }

}