<?php

namespace App\Http\Controllers;

use App\Models\Proizvodi;
use Symfony\Component\HttpFoundation\Request;
use function view;

class ProductsController extends FrontEndController {

    public $data = [];

    public function products($param = null) {

        $proizvodi = new Proizvodi();
        try {

            $this->data['vrste'] = $proizvodi->vrste();
            $this->data['sviProizvodi'] = $proizvodi->dohvatiSve();
            $proizvodi->idVrste = $param;
            $this->data['izabranaVrsta'] = $proizvodi->dohvatiVrstu();
        } catch (\Exception $ex) {
            \Log::error('MOJA GRESKA: ' . $ex->getMessage());
        }
        if (!empty($param)) {
            return view('components.productsByName', $this->data);
        } else {
            return view('components.productsAll', $this->data);
        }
    }

}
