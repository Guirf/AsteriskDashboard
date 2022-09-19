<div>
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
</div>
