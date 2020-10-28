<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Anketa {

    //put your code here
    public $id_ankete;
    public $pitanje;
    public $aktivna;
    public $id_odgovori;
    public $odgovori;
    public $table2 = 'odgovori';
    public $id_rezultat;
    public $rezultat;
    public $table = 'anketa';

    public function prikazPitanja() {

        return DB::table($this->table)
                        ->select('anketa.pitanje')
                        ->where('aktivna', 1)
                        ->get();
    }

    public function prikazOdgovora() {

        return DB::table($this->table)
                        ->select('anketa.pitanje', 'odgovori.*')
                        ->join('odgovori', 'odgovori.id_ankete', '=', 'anketa.id_ankete')
                        ->where('aktivna', 1)
                        ->get();
    }

    public function rezultatAktivne() {

        return DB::table('rezultat')
                        ->select('*')
                        ->join('anketa', 'anketa.id_ankete', '=', 'rezultat.id_ankete')
                        ->join('odgovori', 'odgovori.id_odgovori', '=', 'rezultat.id_odgovori')
                        ->where('anketa.aktivna', 1)
                        ->get();
    }

    public function sacuvajOdgovore() {

        return DB::table('rezultat')
                        ->where('id_odgovori', $this->id_odgovori)
                        ->increment('rezultat', 1);
    }

    //admin
    public function getAll() {
        $rezultat = DB::table($this->table)
                ->get();
        return $rezultat;
    }

    public function get() {
        return DB::table($this->table)
                        ->select('*')
                        ->join('odgovori', 'odgovori.id_ankete', '=', 'anketa.id_ankete')
                        ->where('anketa.id_ankete', $this->id_ankete)
                        ->first();
    }

    public function save() {
        return DB::table($this->table)
                        ->insert([
                            'id_ankete' => $this->id_ankete,
                            'pitanje' => $this->pitanje,
                            'aktivna' => $this->aktivna
        ]);
    }

    public function update() {
        return DB::table($this->table)
                        ->where('id_ankete', $this->id_ankete)
                        ->update([
                            'id_ankete' => $this->id_ankete,
                            'pitanje' => $this->pitanje,
                            'aktivna' => $this->aktivna
        ]);
    }

    public function delete() {
        return DB::table($this->table)
                        ->where('id_ankete', $this->id_ankete)
                        ->delete()
        ;
    }

}
