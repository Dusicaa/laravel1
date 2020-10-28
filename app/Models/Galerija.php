<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Galerija {

    public $id;
    public $alt;
    public $slika;
    public $id_pripada;
    public $table = 'galerija';

    public function dohvatiGaleriju() {
        return DB::table($this->table)
                        ->select('*')
                        ->get();
    }

    public function dohvatiLimit() {
        return DB::table($this->table)
                        ->select('*')
                        ->where('id', '>', '5')
                        ->limit(2)
                        ->get();
    }

    public function dohvatiCetiri() {
        return DB::table($this->table)
                        ->select('*')
                        ->where('id', '>', '10')
                        ->limit(4)
                        ->get();
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
                            'alt' => $this->alt,
                            'slika' => $this->slika,
                            'id_pripada' => $this->id_pripada,
        ]);
    }

    public function update() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->update([
                            'alt' => $this->alt,
                            'slika' => $this->slika,
                            'id_pripada' => $this->id_pripada,
        ]);
    }

    public function delete() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->delete()
        ;
    }

}
