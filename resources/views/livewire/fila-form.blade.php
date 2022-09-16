<x-app-layout>
<livewire:fila-form>

    <select wire:model="teste">
        <option value="0" selected>Selecione um setor</option>
        @foreach($setores ?? '' as $setor)
        <option value="{{ $setor->setor }}">{{ $setor->setor }}</option>
        @endforeach
    </select>

</x-app-layout>
@json($teste);


