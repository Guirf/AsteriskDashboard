<?php

namespace App\Http\Controllers;

use App\Models\Sippeer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ActionsController extends Controller {
    
    public function index() {

        $dados = DB::select('select * from sippeers');

        return view('dashboard', [
            'dados' => $dados
        ]);
    }

    public function addRamal() {

        return view('addRamal');
    }

    public function addRamalNew(request $request) {
        // fazer verificação se o ramal já existe e botar sweetalert
        $request->validate([
            'ramalnum' => 'required|int|max:4|min:4',
            'callerid' => 'required|string',
            'setor' => 'required'

        ], [
            'ramalnum.required' => 'Este campo é obrigatório',
            'ramalnum.integer' => 'O campo Ramal deve conter apenas números!',
            'ramalnum.max' => 'O campo deve conter 4 dígitos!',
            'ramalnum.min' => 'O campo deve conter 4 dígitos!',

            'callerid.required' => 'Este campo é obrigatório!',

            'setor.required' => 'Este campo é obrigatório!',


            
        ]
    );
        
        $new_ramal = new Sippeer();

        $new_ramal->name = $request->input('ramalnum');
        $new_ramal->type = 'friend';
        $new_ramal->context = $request->input('setor');
        $new_ramal->secret = $request->input('senha');
        $new_ramal->transport = 'udp';
        $new_ramal->dtmfmode = 'rfc2833';
        $new_ramal->disallow = 'all';
        $new_ramal->allow = 'gsm';
        $new_ramal->callerid = $request->input('callerid');
        $new_ramal->dynamic = 'yes';

        $new_ramal->save();

        echo "ramal adicionado";


    }

    public function logIn(Request $request) {
        //vincular o usuário a um setor
        // adicionar um ramal à fila
        
        $membername = Auth::user()->name;
        $login = new Queue();

        $login->queue_name = 'Assist';
        $login->interface = 'SIP/'.$membername;
        $login->membername = $membername;
        
    } 
}

