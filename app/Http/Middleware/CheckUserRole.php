<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

use Closure;
use function redirect;

/**
 * Description of CheckUserRole
 *
 * @author Duca
 */
class CheckUserRole {
    //put your code here
    
    public function handle($request,Closure $next) {
        
        
        if($request->session()->has('user')){
            
              if(session()->get('user')[0]->naziv == 'admin'){
                return $next($request);
            }
            else {
                return redirect('/home');
            }
        }
        return redirect('/home');
    }
}
