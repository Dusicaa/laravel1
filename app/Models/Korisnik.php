<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Korisnik {

    public $id;
    public $ime;
    public $prezime;
    public $korisnickoime;
    public $lozinka;
    public $mejl;
    public $telefon;
    public $slika;
    public $ulogaid;
    public $naziv;
    public $table = 'korisnik';

    public function dohvatiPo() {

        return DB::table($this->table)
                        ->select('*')
                        ->join('uloga', 'korisnik.uloga_id', '=', 'uloga.id')
                        ->where([
                            'korisnicko_ime' => $this->korisnickoime,
                            'lozinka' => md5($this->lozinka)
                        ])
                        ->first();
    }

    public function unesiKorisnika() {
        return \DB::table($this->table)
                        ->insertGetId([
                            'ime' => $this->ime,
                            'prezime' => $this->prezime,
                            'korisnicko_ime' => $this->korisnickoime,
                            'lozinka' => md5($this->lozinka),
                            'mejl' => $this->mejl,
                            'telefon' => $this->telefon,
                            'slika' => $this->slika,
                            'uloga_id' => $this->ulogaid
        ]);
    }

    public function getAll() {
        $rezultat = DB::table($this->table)->get();
        return $rezultat;
    }

    public function get() {
        return DB::table($this->table)
                        ->select('*')
                        ->where('id', $this->id)
                        ->first();
    }

    public function save() {
        return DB::table($this->table)
                        ->insert([
                            'ime' => $this->ime,
                            'prezime' => $this->prezime,
                            'korisnicko_ime' => $this->korisnickoime,
                            'lozinka' => md5($this->lozinka),
                            'mejl' => $this->mejl,
                            'telefon' => $this->telefon,
                            'slika' => $this->slika,
                            'uloga_id' => $this->ulogaid
        ]);
    }

    public function update() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->update([
                            'ime' => $this->ime,
                            'prezime' => $this->prezime,
                            'korisnicko_ime' => $this->korisnickoime,
                            'lozinka' => md5($this->lozinka),
                            'mejl' => $this->mejl,
                            'telefon' => $this->telefon,
                            'slika' => $this->slika,
                            'uloga_id' => $this->ulogaid
        ]);
    }

    public function delete() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->delete()
        ;
    }

}
