<?php

namespace App\Http\Controllers;

use App\Models\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use function public_path;
use function redirect;

class UpravljanjeKorisnicimaController extends FrontEndController {

    public $data = [];
    private $model = null;

    public function show($id = null) {
        $korisnik = new Korisnik();
        $this->data['korisnici'] = $korisnik->getAll();

        if (!empty($id)) {
            $korisnik->id = $id;
            $this->data['updateUser'] = $korisnik->get();
        }
        return view('pages.admin_panel.korisnici', $this->data);
    }

    public function store(Request $request) {
        $request->validate([
            'ime' => 'required|alpha|min:2|max:20',
            'prezime' => 'required|alpha|min:2|max:20',
            'korisnicko_ime' => 'required|min:2|max:20',
            'lozinka' => [
                'required',
                'min:6',
                'regex:/^[a-zA-Z\d]{6,}$/'
            ],
            'mejl' => 'required|email',
            'telefon' => [
                'required',
                'regex:/^[0-9]{10,20}$/'
            ]
                ], [
            'min' => 'Minimalni broj karaktera je 2.',
            'max' => 'Maximalni broj karaktera je 20.',
            'alpha' => ' U polje :attribute upišite samo slova!',
            'email' => 'Upišite validnu mejl adresu!',
            'required' => 'Polje :attribute je obavezno !',
            "lozinka.regex" => 'Lozinka mora da sadrži najmanje 6 karaktera- velika i mala slova kao i broj.',
            'telefon.regex' => 'Telefon je u neispravnom formatu!'
        ]);


        $korisnikR = new Korisnik();

        $korisnikR->ime = $request->get('ime');
        $korisnikR->prezime = $request->get('prezime');
        $korisnikR->korisnickoime = $request->get('korisnicko_ime');
        $korisnikR->lozinka = $request->get('lozinka');
        $korisnikR->mejl = $request->get('mejl');
        $korisnikR->telefon = $request->get('telefon');
        $korisnikR->ulogaid = $request->get('ulogaId');

        $slika = $request->file('slika');

        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();

        $imeFajla = $request->get('korisnicko_ime') . '.' . $ekstenzija;
        $putanja = 'images/korisnici/' . $imeFajla;
        $putanjaServer = public_path($putanja);


        $korisnikR->slika = $putanja;
        try {
            //upload na server
            File::move($tmp_putanja, $putanjaServer);
        } catch (QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Greška, pokušajte opet.");
        }
        $rez = $korisnikR->unesiKorisnika();
        if ($rez == 1) {
            return redirect()->back()->with('success', 'Dodat korisnik!');
        } else {
            return redirect()->back()->with('error', 'Greska pri dodavanju korisnika!');
        }
    }

    public function update($id, Request $request) {
        $korisnikR = new Korisnik();
        $korisnikR->id = $id;
        $korisnikR->ime = $request->get('ime');
        $korisnikR->prezime = $request->get('prezime');
        $korisnikR->korisnickoime = $request->get('korisnicko_ime');
        $korisnikR->lozinka = $request->get('lozinka');
        $korisnikR->mejl = $request->get('mejl');
        $korisnikR->telefon = $request->get('telefon');
        $korisnikR->ulogaid = $request->get('ulogaId');

        $slika = $request->file('slika');

        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();

        $imeFajla = $request->get('korisnicko_ime') . '.' . $ekstenzija;
        $putanja = 'images/korisnici/' . $imeFajla;
        $putanjaServer = public_path($putanja);


        $korisnikR->slika = $putanja;
        try {
            //upload na server
            File::move($tmp_putanja, $putanjaServer);
        } catch (QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Greška, pokušajte opet.");
        }

        $rez = $korisnikR->update();
        if ($rez == 1) {
            return redirect()->back()->with('success', 'Izmenjen korisnik!');
        } else {
            return redirect()->back()->with('error', 'Greska pri izmeni korisnika!');
        }
    }

    public function destroy($id) {
        $korisnik = new Korisnik();
        $korisnik->id = $id;
        $rez = $korisnik->delete();

        if ($rez == 1) {
            return redirect()->back()->with('success', 'Obrisan korisnik!');
        } else {
            return redirect()->back()->with('error', 'Greska pri brisanju korisnika!');
        }
    }

}
