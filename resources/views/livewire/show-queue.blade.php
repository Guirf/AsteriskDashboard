<div class="py-12 container">
    <div class="max-w-1xl mx-auto sm:px-10 lg:px-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card shadow">
                        <div class="container-fluid">
                            <div class="card-body" style="height: 520px;">
                                <div class="d-flex align-items-center justify-content-center icon-card">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="110" height="130" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </div>

                                <div class="d-flex flex-col align-items-center justify-content-center">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <h5>Assist  |  {{ $interface }}</h5>
                                </div>
                                <br><br>
                                <div class="container">
                                    <form wire:submit.prevent='login' >
                                        @csrf

                                        <select class="rounded-3" wire:click='verificalogin' style="width: 100%" wire:model='queue_name'>
                                            <option  selected hidden>Selecionar setor</option>
                                            @foreach($setores as $setor)
                                            <option value="{{ $setor->setor }}">{{ $setor->setor }}</option>
                                            @endforeach
                                        </select>

                                        <br><br>

                                        <select wire:click='verificalogin' class="rounded-3" style="width:100%;" wire:model='action'>
                                            <option value="" selected>Selecionar pausa</option>
                                            @if(session()->has('login')||session()->has('logged'))
                                            
                                            <option value="">Pausa descanso</option>
                                            <option value="">Pausa refeição</option>
                                            
                                            @else
                                            
                                            <option value="">Login</option>
                                            @endif
                                        </select>

                                        <div>
                                            @include('layouts.alerts')
                                        </div>
                                        <br>
                                        <div class="d-flex w-100 d-flex justify-content-end">
                                            <button class="btn btn-success" type="submit">Concluir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>