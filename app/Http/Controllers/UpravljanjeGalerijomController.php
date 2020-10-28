<?php

namespace App\Http\Controllers;

use App\Models\Galerija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use function public_path;
use function redirect;

class UpravljanjeGalerijomController extends FrontEndController {

    public $data = [];
    private $model = null;

    public function __construct() {
        $this->model = new Galerija();
    }

    public function show($id = null) {
        $this->data['galleries'] = $this->model->dohvatiGaleriju();

        if (!empty($id)) {
            $this->model->id = $id;
            $this->data['updatePicture'] = $this->model->get();
        }
        return view('pages.admin_panel.slike', $this->data);
    }

    public function store(Request $request) {


        $galerijaR = new Galerija();

        $galerijaR->alt = $request->get('alt');
        $galerijaR->id_pripada = $request->get('id_pripada');


        $slika = $request->file('slika');

        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();
        $imeFajla = time() . '.' . $ekstenzija;

        if ($request->get('id_pripada') == 1) {
            $putanja = 'images/bidermajeri/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 2) {
            $putanja = 'images/dekoracija/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 3) {
            $putanja = 'images/frizure/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 4) {
            $putanja = 'images/nakit/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 5) {
            $putanja = 'images/ukrasi_za_kosu/' . $imeFajla;
        } else {
            $putanja = 'images/' . $imeFajla;
        }

        $putanjaServer = public_path($putanja);


        $galerijaR->slika = $putanja;
        try {
            //upload na server
            File::move($tmp_putanja, $putanjaServer);
        } catch (QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Greška, pokušajte opet.");
        }
        $rez = $galerijaR->save();
        if ($rez == 1) {
            return redirect()->back()->with('success', 'Dodata slika!');
        } else {
            return redirect()->back()->with('error', 'Greska pri dodavanju slike!');
        }
    }

    public function update($id, Request $request) {
        $galerijaR = new Galerija();
        $galerijaR->id = $id;
        $galerijaR->alt = $request->get('alt');
        $galerijaR->id_pripada = $request->get('id_pripada');

        $slika = $request->file('slika');

        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();

        $imeFajla = time() . '.' . $ekstenzija;
        if ($request->get('id_pripada') == 1) {
            $putanja = 'images/bidermajeri/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 2) {
            $putanja = 'images/dekoracija/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 3) {
            $putanja = 'images/frizure/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 4) {
            $putanja = 'images/nakit/' . $imeFajla;
        } elseif ($request->get('id_pripada') == 5) {
            $putanja = 'images/ukrasi_za_kosu/' . $imeFajla;
        } else {
            $putanja = 'images/' . $imeFajla;
        }
        $putanjaServer = public_path($putanja);


        $galerijaR->slika = $putanja;
        try {
            //upload na server
            File::move($tmp_putanja, $putanjaServer);
        } catch (QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Greška, pokušajte opet.");
        }

        $rez = $galerijaR->update();
        if ($rez == 1) {
            return redirect()->back()->with('success', 'Izmenjena slika!');
        } else {
            return redirect()->back()->with('error', 'Greska pri izmeni slike!');
        }
    }

    public function destroy($id) {
        $galerijaR = new Galerija();
        $galerijaR->id = $id;
        $rez = $galerijaR->delete();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Obrisana slika!');
        } else {
            return redirect()->back()->with('error', 'Greska pri brisanju slike!');
        }
    }

}
