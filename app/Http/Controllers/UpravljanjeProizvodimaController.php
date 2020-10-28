<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Proizvodi;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use function public_path;
use function redirect;

/**
 * Description of UpravljanjeProizvodimaController
 *
 * @author Duca
 */
class UpravljanjeProizvodimaController extends FrontEndController {

    //put your code here

    public $data = [];
    private $model = null;

    public function show($id = null) {
        $proizvodi = new Proizvodi();
        $this->data['proizvodi'] = $proizvodi->getAll();

        if (!empty($id)) {
            $proizvodi->id = $id;
            $this->data['updateProduct'] = $proizvodi->get();
        }
        return view('pages.admin_panel.proizvodi', $this->data);
    }

    public function store(Request $request) {
        $proizvodi = new Proizvodi();

        $proizvodi->naziv = $naziv = $request->get('naziv');
        $proizvodi->opis = $opis = $request->get('opis');
        $proizvodi->cena = $cena = $request->get('cena');
        $proizvodi->galerija_id = $galerija_id = $request->get('galerija_id');
        $proizvodi->id_pripada = $id_pripada = $request->get('id_pripada');


        $rez = $proizvodi->save();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Dodat proizvod!');
        } else {
            return redirect()->back()->with('error', 'Greska pri dodavanju proizvoda!');
        }
    }

    public function update($id, Request $request) {
        $proizvodi = new Proizvodi();

        $proizvodi->naziv = $naziv = $request->get('naziv');
        $proizvodi->opis = $opis = $request->get('opis');
        $proizvodi->cena = $cena = $request->get('cena');
        $proizvodi->galerija_id = $galerija_id = $request->get('galerija_id');
        $proizvodi->id_pripada = $id_pripada = $request->get('id_pripada');

        $rez = $proizvodi->update();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Azuriran proizvod!');
        } else {
            return redirect()->back()->with('error', 'Greska pri azuriranju proizvoda!');
        }
    }

    public function destroy($id) {
        $proizvodi = new Proizvodi();
        $proizvodi->id = $id;
        $rez = $proizvodi->delete();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Obrisan proizvod!');
        } else {
            return redirect()->back()->with('error', 'Greska pri brisanju proizvoda!');
        }
    }

}
