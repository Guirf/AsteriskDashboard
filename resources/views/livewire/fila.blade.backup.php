<form>
    <button wire:click.prevent="logIn"  class="btn btn-primary @if(session()->has('login')) disabled @endif">Logar</button><br><br>
    @if (session()->has('login'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Logado com sucesso!',
                showConfirmButton: false,
                timer: 1500,
                toast: true
            })
        </script>
    @elseif(session()->has('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Deslogado com sucesso!',
            showConfirmButton: false,
            timer: 1500,
            toast: true
        })
    </script>
    @endif
    
    <button  wire:click.prevent="logOut" class="btn btn-danger @if(session()->has('logout')) disabled @endif">Deslogar</button><br>
    <div>   
        @if (session()->has('logout'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Deslogado com sucesso!',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true
                })
            </script>
        @endif
    </div>
    <br>
    <button  wire:click.prevent="paused" class="btn btn-warning ">Pausar</button><br>
    <div>
        @if (session()->has('paused'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Pausado com sucesso!',
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true
                })
            </script>
        @endif
    </div>
    <br>
    <button  wire:click.prevent="unpaused" class="btn btn-warning">Despausar</button><br>
    <div>
        @if (session()->has('unpaused'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Despausado com sucesso!',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true
                })
            </script>
        @endif
    </div>
    <input wire:model="message" type="text">
 
<h1>nome: {{ $message }}</h1>
</form>
<br><br><br>

<div>
    
</div>




<form wire:submit.prevent='login'>
    @csrf
    <select wire:model='queue_name'>
        <option value="0" selected>Selecionar setor</option>
        @foreach($setores as $setor)
        <option  value="{{ $setor->setor }}">{{ $setor->setor }}</option>
        @endforeach
    </select>
    <div>
        @include('layouts.alerts')
    </div>
    <button class="btn btn-success" type="submit">Concluir</button>
</form>