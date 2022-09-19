<?php

namespace App\Http\Livewire;

use App\Models\Queue_member;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class ShowQueue extends Component {
    
    public $queue_name;
    public $action;
    
    public function render() {
        $nome_usuario = Auth::user()->name;
        // Lista os setores disponíveis para o usuário
        $setores = DB::table('users')
                ->select('department.name as setor', 'users.name')
                ->join('user_department', 'user_department.user_id', '=', 'users.id')
                ->join('department', 'department.id', '=', 'user_department.department_id')
                ->where('users.name', '=', $nome_usuario)
                ->get()->toArray();

        
        $pega_ramal = DB::table('sippeers')
                ->select('sippeers.name')
                ->join('users', 'users.id', '=', 'sippeers.user_id')
                ->where('users.name', '=', $nome_usuario)
                ->get()->toArray();

        foreach($pega_ramal as $ramal) {
            $interface = $ramal->name;
                            
        }


        return view('livewire.show-queue', [
            'setores' => $setores,
            'interface' => $interface
        ]);
    }

    public function login() {  

        $nome_usuario = Auth::user()->name;

        // pega o numero do ramal do usuário
        $pega_ramal = DB::table('sippeers')
                    ->select('sippeers.name')
                    ->join('users', 'users.id', '=', 'sippeers.user_id')
                    ->where('users.name', '=', $nome_usuario)
                    ->get()->toArray();

        foreach($pega_ramal as $ramal) {
            $interface = $ramal->name;
            
        }

        $queue_name = $this->queue_name;
        $action = $this->action;

        //verifica se o usuário já está logado
        $isLoged = DB::table('queue_members')
                ->select('queue_name')
                ->where('queue_name', '=', $queue_name)
                ->where('interface', '=', $interface)
                ->get()->count();

        if($isLoged > 0) {
            session()->flash('alreadyloged');

        } else {

            $login = new Queue_member();

            //variável que chama o model->campo da tabela = $variável vinda da view
            

            $login->membername = $nome_usuario;
            $login->queue_name = $queue_name;
            $login->interface = $interface;
            $login->save();

            session()->flash('login');
            
        }

    }

    public function verificalogin() {

        $queue_name = $this->queue_name;

        $isLoged = DB::table('queue_members')
        ->select('queue_name')
        ->where('queue_name', '=', $queue_name)
        ->where('interface', '=', '1000')
        ->get()->count();
        
        if($isLoged > 0) {
            
            session()->flash('logged');
        }

    }
}
