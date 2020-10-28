<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\Anketa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use function public_path;
use function redirect;

/**
 * Description of UpravljanjeAnketamaController
 *
 * @author Duca
 */
class UpravljanjeAnketamaController extends FrontEndController {

    //put your code here

    public $data = [];
    private $model = null;

    public function show($id = null) {
        $anketa = new Anketa();

        $this->data['ankete'] = $anketa->getAll();

        if (!empty($id)) {
            $anketa->id_ankete = $id;
            $this->data['updatePoll'] = $anketa->get();
        }
        return view('pages.admin_panel.ankete', $this->data);
    }

    public function store(Request $request) {
        $pitanje = $request->get('pitanje');
        $aktivna = $request->get('aktivna');


        $anketa = new Anketa();

        $anketa->pitanje = $pitanje;
        $anketa->aktivna = $aktivna;


        $rez = $anketa->save();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Dodata anketa!');
        } else {
            return redirect()->back()->with('error', 'Greska pri dodavanju ankete!');
        }
    }

    public function update($id, Request $request) {
        $pitanje = $request->get('pitanje');
        $aktivna = $request->get('aktivna');

        $anketa = new Anketa();
        $anketa->id_ankete = $id;
        $anketa->pitanje = $pitanje;
        $anketa->aktivna = $aktivna;

        $rez = $anketa->update();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Azurirana anketa!');
        } else {
            return redirect()->back()->with('error', 'Greska pri azuriranju ankete!');
        }
    }

    public function destroy($id) {
        $anketa = new Anketa();
        $anketa->id_ankete = $id;
        $rez = $anketa->delete();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Obrisana anketa!');
        } else {
            return redirect()->back()->with('error', 'Greska pri brisanju ankete!');
        }
    }

}
