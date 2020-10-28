<?php

namespace App\Http\Controllers;

use App\Models\Meni;
use Illuminate\Http\Request;

class UpravljanjeMenijemController extends FrontEndController {

    public $data = [];
    private $model = null;

    public function show($id = null) {
        $meni = new Meni();
        $this->data['meni'] = $meni->getAll();

        if (!empty($id)) {
            $meni->id = $id;
            $this->data['updateMenu'] = $meni->get();
        }
        return view('pages.admin_panel.meni', $this->data);
    }

    public function store(Request $request) {
        $request->validate([
            'naziv' => [
                'required'
            ]
                ], [
            'required' => 'Polje :attribute je obavezno'
        ]);

        $naziv = $request->get('naziv');
        $ruta = $request->get('ruta');
        $roditelj = $request->get('roditelj');
        $tezina = $request->get('tezina');

        $meni = new Meni();
        $meni->naziv = $naziv;
        $meni->ruta = $ruta;
        $meni->roditelj = $roditelj;
        $meni->tezina = $tezina;
        $rez = $meni->save();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Dodat meni!');
        } else {
            return redirect()->back()->with('error', 'Greska pri dodavanju menija!');
        }
    }

    public function update($id, Request $request) {
        $naziv = $request->get('naziv');
        $ruta = $request->get('ruta');
        $roditelj = $request->get('roditelj');
        $tezina = $request->get('tezina');


        $meni = new Meni();
        $meni->id = $id;
        $meni->naziv = $naziv;
        $meni->ruta = $ruta;
        $meni->roditelj = $roditelj;
        $meni->tezina = $tezina;
        $rez = $meni->update();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Azuriran meni!');
        } else {
            return redirect()->back()->with('error', 'Greska pri azuriranju menija!');
        }
    }

    public function destroy($id) {
        $meni = new Meni();
        $meni->id = $id;
        $rez = $meni->delete();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Obrisan meni!');
        } else {
            return redirect()->back()->with('error', 'Greska pri brisanju menija!');
        }
    }

}
