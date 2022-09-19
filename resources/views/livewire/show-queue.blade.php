<div class="py-12 container">
    <div class="max-w-1xl mx-auto sm:px-10 lg:px-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card shadow">
                        <div class="container-fluid">

                            <div class="card-body" style="height: 520px;">
                                <div class="d-flex align-items-center justify-content-center icon-card">
                                    <i class="bi bi-person-circle"></i>
                                    <i class="bi bi-window-x"></i>
                                </div>

                                <div class="d-flex flex-col align-items-center justify-content-center">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p><h5>Assist  |  {{ $interface }}</h5></p>
                                </div>
                                <br><br>
                                <div class="container">
                                    <form wire:submit.prevent='login'>
                                        @csrf

                                        <select class="rounded-3" wire:click='verificalogin' style="width: 100%" wire:model='queue_name'>
                                            <option  selected hidden>Selecionar setor</option>
                                            @foreach($setores as $setor)
                                            <option value="{{ $setor->setor }}">{{ $setor->setor }}</option>
                                            @endforeach
                                        </select>

                                        <br><br>

                                        <select class="rounded-3" style="width:100%;">
                                            <option value="" selected>Selecionar pausa</option>
                                            <option value="">Login</option>
                                            {{session()->get('login')}}
                                            @if(session()->has('login')||session()->has('logged'))
                                            <option value="" selected>Pausa descanso</option>
                                            <option value="">Pausa refeição</option>
                                            @endif
                                        </select>

                                        <div>
                                            @include('layouts.alerts')
                                        </div>
                                        <br>
                                        <button class="btn btn-success d-flex justify-content-end" type="submit">Concluir</button>
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