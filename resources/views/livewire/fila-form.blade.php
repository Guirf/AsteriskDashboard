<div class="container">
    <select wire:model="teste">
        <option value="0" selected>Selecione um setor</option>
        <option value="1" selected>{{ Auth::user()->department; }}</option>
    </select>
 
    <h1>@json($teste)</h1>
</div>

