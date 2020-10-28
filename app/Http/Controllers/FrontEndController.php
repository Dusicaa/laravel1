<?php

namespace App\Http\Controllers;

use App\Models\Anketa;
use App\Models\Galerija;
use App\Models\Meni;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function public_path;
use function response;
use function view;

class FrontEndController extends Controller {

    //put your code here
    public $data = [];

    public function __construct() {
        $menu = new Meni();

        $this->data['meni'] = $menu->getAll();
    }

    public function index() {

        $galerija = new Galerija();

        $this->data['dva'] = $galerija->dohvatiLimit();
        $this->data['cetiri'] = $galerija->dohvatiCetiri();
        return view('pages.home', $this->data);
    }

    public function gallery() {

        $galerija = new Galerija();

        $this->data['galerija'] = $galerija->dohvatiGaleriju();
        return view('pages/gallery', $this->data);
    }

    public function showlogin() {

        return view('pages/login', $this->data);
    }

    public function showRegistration() {
        return view('pages/registration', $this->data);
    }

    public function contact() {
        $anketa = new Anketa();
        $this->data['prikazP'] = $anketa->prikazPitanja();
        $this->data['prikazO'] = $anketa->prikazOdgovora();
        return view('pages.contact', $this->data);
    }

    public function author() {
        return view('pages/author', $this->data);
    }

    public function admin() {
        return view('pages/admin', $this->data);
    }

    public function download() {

        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download(public_path('documentation.pdf'), 'dc2213.pdf', $headers);
    }

    public function sitemap() {
    

        return view('pages.sitemap', $this->data);
    }

    public function wishlist(Request $request) {
        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->pro_id = $request->get('pro_id');
        $wishlist->save();

        $this->data['wishData'] = DB::table('wishlist')
                ->leftJoin('proizvodi', 'proizvodi.id', '=', 'wishlist.pro_id')
                ->get();
        $count = App\Models\Wishlist::where(['pro_id' => $proizvod->id])->count();

        $products = DB::table('products')
                ->where('id', $request->pro_id)
                ->get();
        return view('pages.products', $this->data);
    }

}
