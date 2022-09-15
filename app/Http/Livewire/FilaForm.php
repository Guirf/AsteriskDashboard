<?php

namespace App\Http\Livewire;
use App\Models\Sippeer;
use App\Models\Queue_member;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FilaForm extends Component {
    
    public $teste;

    public function logIn(Request $request) {

        $login = new Queue_member();

        $query = Queue_member::where('interface', '=', 'SIP/1000')->get()->count();

        if($query ) {

            session()->flash('error');
            
        } else {

            $membername = Auth::user()->name;

            $login->queue_name = 'Assist';
            $login->interface = 'SIP/1000';
            $login->membername = $membername;

            $login->save();

            session()->flash('login');
        }

    }

    public function logOut(Request $request) {

        //$teste = new Queue_member();
        
        $teste = Queue_member::where('interface', '=', 'SIP/1000');
        
 
        $teste->delete();
        
        session()->flash('logout');
    }

    public function paused() {
        $queue = Queue_member::where('interface', '=', 'SIP/1000')->update([
            'paused' => '1'
        ]);

        session()->flash('paused');

        
    }

    public function unpaused() {
        $queue = Queue_member::where('interface', '=', 'SIP/1000')->update([
            'paused' => '0'
        ]);

        session()->flash('unpaused');
        
    }

}
