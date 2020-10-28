<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Proizvodi {

    public $id;
    public $naziv;
    public $opis;
    public $cena;
    public $galerija_id;
    public $id_pripada;
    public $idVrste;
    public $nazivVrste;
    public $table = 'proizvodi';

    public function dohvatiSve() {
        return DB::table('proizvodi')
                        ->select('*')
                        ->join('galerija as g', 'proizvodi.galerija_id', '=', 'g.id')
                        ->get();
    }

    public function dohvatiVrstu() {
        return DB::table('proizvodi')
                        ->select('*', 'proizvodi.id as proizvodId')
                        ->join('galerija as g', 'g.id', '=', 'proizvodi.galerija_id')
                        ->join('vrsta as v', 'v.id', '=', 'proizvodi.id_pripada')
                        ->where('proizvodi.id_pripada', $this->idVrste)
                        ->get();
    }

    public function vrste() {
        return DB::table('vrsta')
                        ->select('*')
                        ->get();
    }

    //admin
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
                            'naziv' => $this->naziv,
                            'opis' => $this->opis,
                            'cena' => $this->cena,
                            'galerija_id' => $this->galerija_id,
                            'id_pripada' => $this->id_pripada
        ]);
    }

    public function update() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->update([
                            'naziv' => $this->naziv,
                            'opis' => $this->opis,
                            'cena' => $this->cena,
                            'galerija_id' => $this->galerija_id,
                            'id_pripada' => $this->id_pripada
        ]);
    }

    public function delete() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->delete()
        ;
    }

}
