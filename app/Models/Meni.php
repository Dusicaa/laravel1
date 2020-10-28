<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Meni {

    public $id;
    public $naziv;
    public $tezina;
    public $roditelj;
    public $ruta;
    public $table = 'meni';

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
                            'ruta' => $this->ruta,
                            'roditelj' => $this->roditelj,
                            'tezina' => $this->tezina
        ]);
    }

    public function update() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->update([
                            'naziv' => $this->naziv,
                            'ruta' => $this->ruta,
                            'roditelj' => $this->roditelj,
                            'tezina' => $this->tezina
        ]);
    }

    public function delete() {
        return DB::table($this->table)
                        ->where('id', $this->id)
                        ->delete()
        ;
    }

}
