<?php $etapas = \App\Etapa::all() ?>  
<div class="mb-3">
    <label for="selectFilterEtapa" class="form-label small">Etapa</label>
    <select name="etapa" id="selectFilterEtapa" class="form-control">
        <option value="cualquier" selected>- Cualquier etapa -</option>
        @foreach ($etapas as $etapa)
        <option value="{{ $etapa->id }}" {{ selectable(request('etapa'), $etapa->id) }}>{{ $etapa->nombre }}</option>
        @endforeach
        <option value="ninguno">Ningúna etapa</option>
    </select>
</div>
