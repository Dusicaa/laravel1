<?php

namespace App\Http\Controllers;

use App\Models\Anketa;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;
use function view;

/**
 * Description of AnketaController
 *
 * @author Duca
 */
class AnketaController extends FrontEndController {

    //put your code here
    public $data = [];

    public function anketa(Request $request) {
        $rezultat = new Anketa();
        $rezultat->id_odgovori = $request->get('anketa');

        $sacuvajOdg = $rezultat->sacuvajOdgovore();
        $this->data['rezultat'] = $rezultat->rezultatAktivne();
        return view('pages.contact', $this->data);
    }

    public function mejl($param = null, Request $request) {

        $user = $request->get('tbMejl');
        $poruka = $request->get('tbPitanje');

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $this->data['mail'] = $mail;
        Mail::send('pages.contact', $this->data, function ($m) use ($user) {
            $m->from($user, 'sample');

            $m->to('dusicacakic@gmail.com', 'mejl to me')->subject('$poruka');
        });
    }

}
