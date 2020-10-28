<?php

namespace App\Http\Controllers;

use App\Models\Korisnik;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function asset;
use function public_path;
use function redirect;

class LoginController extends Controller {

    public function login(Request $request) {

        $request->validate([
            'tbKorisnickoIme' => ['required', 'alpha']
                ], [
            'required' => 'Polje :attribute je obavezno!'
        ]);

        $korisnickoIme = $request->get('tbKorisnickoIme');
        $lozinka = $request->get('tbLozinka');

        $korisnik = new Korisnik();
        $korisnik->korisnickoime = $korisnickoIme; //setovanje
        $korisnik->lozinka = $lozinka;
        try {
            $logovanKorisnik = $korisnik->dohvatiPo();
        } catch (\Exception $ex) {
            \Log::error('GRESKA u dohvatanju korisnika: ' . $ex->getMessage());
        }


        if (!empty($logovanKorisnik)) {

            $request->session()->push('user', $logovanKorisnik);
            return redirect('/')->with('success', 'uspesno ste se logovali');
        }
        return redirect()->back()->with('error', 'Niste logovani!');
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect()->back();
    }

    public function registration(Request $request) {
        $rules = [
            'tbIme' => 'required|alpha|min:2|max:20',
            'tbPrezime' => 'required|alpha|min:2|max:20',
            'tbKorisnickoIme' => 'required|min:2|max:20',
            'tbLozinka' => [
                'required',
                'min:6',
                'regex:/^[a-zA-Z\d]{6,}$/'
            ],
            'tbMejl' => 'required|email',
            'tbTelefon' => [
                'required',
                'regex:/^[0-9]{10,20}$/'
            ]
        ];
        $messages = [
            'min' => 'Minimalni broj karaktera je 2.',
            'max' => 'Maximalni broj karaktera je 20.',
            'alpha' => ' U polje :attribute upišite samo slova!',
            'email' => 'Upišite validnu mejl adresu!',
            'required' => 'Polje :attribute je obavezno !',
            "tbLozinka.regex" => 'Lozinka mora da sadrži najmanje 6 karaktera- velika i mala slova kao i broj.',
            'tbTelefon.regex' => 'Telefon je u neispravnom formatu!'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $korisnikR = new Korisnik();
        $korisnikR->ime = $request->get('tbIme');
        $korisnikR->prezime = $request->get('tbPrezime');
        $korisnikR->korisnickoime = $request->get('tbKorisnickoIme');
        $korisnikR->lozinka = $request->get('tbLozinka');
        $korisnikR->mejl = $request->get('tbMejl');
        $korisnikR->telefon = $request->get('tbTelefon');
        $korisnikR->ulogaid = 2;

        $slika = $request->file('tbSlika');

        $tmp_putanja = $slika->getPathName();
        $ekstenzija = $slika->getClientOriginalExtension();

        $imeFajla = $request->get('tbKorisnickoIme') . '.' . $ekstenzija;
        $putanja = 'images/korisnici/' . $imeFajla;
        $putanjaServer = public_path($putanja);
        $korisnikR->slika = $putanja;
        try {

            //upload na server
            File::move($tmp_putanja, $putanjaServer);

            //unos korisnika
            $korisnikR->unesiKorisnika();
            return redirect('showRegistration')->with("success", "Uspešno ste se registrovali!");
        } catch (QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "Greška, pokušajte opet.");
        }
    }

}
