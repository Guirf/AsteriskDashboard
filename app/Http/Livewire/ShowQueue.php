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

        $action = $this->teste;

    }

    public function queue_action() {

        $queue_name = $this->queue_name;
        $nome_usuario = Auth::user()->name;
        $queue_name = $this->queue_name;
        $action = $this->action;

        $login = new Queue_member();

        $pega_ramal = DB::table('sippeers')
                    ->select('sippeers.name')
                    ->join('users', 'users.id', '=', 'sippeers.user_id')
                    ->where('users.name', '=', $nome_usuario)
                    ->get()->toArray();

            foreach($pega_ramal as $ramal) {
                $interface = $ramal->name;
            
            }

        $isLoged = DB::table('queue_members')
                ->select('queue_name')
                ->where('queue_name', '=', $queue_name)
                ->where('interface', '=', $interface)
                ->get()->count();

        if($action == 'login') {

            if($isLoged > 0 ) {
                session()->flash('alreadyloged');
    
            } else {
                $login->membername = $nome_usuario;
                $login->queue_name = $queue_name;
                $login->interface = $interface;
                $login->save();
                session()->flash('login');
            } 

        } else if ($action == 'pausa_descanso') {
            $pausa = Queue_member::where('interface', '=', $interface)
                                ->where('queue_name', '=', $queue_name)
                                ->update([
                                    'paused' => 1
                                ]);
    
            session()->reflash('paused');

        } else if ($action == 'deslogar') {
            Queue_member::where('interface', '=', $interface)
                        ->where('queue_name', '=', $queue_name)
                        ->delete();
            
            session()->flash('logout');

        }
        
        // if($isLoged > 0 && $action == 'login') {
        //     session()->flash('alreadyloged');

        // } else {
            
        //     $login->membername = $nome_usuario;
        //     $login->queue_name = $queue_name;
        //     $login->interface = $interface;
        //     $login->save();
        //     session()->flash('login');
            
        // }

        // if($action == 'pausa_desanso') {

           
        // }


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

    public function verificaPausa() {
        $queue_name = $this->queue_name;

        $isPaused = DB::table('queue_members')
        ->select('paused')
        ->where('queue_name', '=', $queue_name)
        ->where('interface', '=', '1000')
        ->where('membername', '=', 'Guilherme')
        ->get()->toArray();
        
        foreach($isPaused as $paused) {
            $pausa = $paused->paused;
            
        }

        if($isPaused == '1') {
            dd('entrou');
            session()->flash('paused');
        }

    }
}
