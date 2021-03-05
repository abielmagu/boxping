@if( $alertas->count() )
<label class="form-label small">Alertas</label>
<div class="border rounded p-3">
    <div class="">
        @foreach($alertas as $alerta)
        <div class="form-check">
            <input 
                class="form-check-input" 
                type="checkbox" 
                name="alertas[]" 
                value="{{ $alerta->id }}" 
                id="checkbox-alerta-{{ $alerta->id }}" 
                {{ in_array($alerta->id, $alertas_attached) ? 'checked' : '' }}
                style="border: 2px solid {{ $config_alertas[$alerta->nivel]['color'] }};"
            >
            
            <label class="form-check-label" for="checkbox-alerta-{{ $alerta->id }}">
                <span>{{ $alerta->nombre }}</span>
                <small class="d-none">{{ $alerta->descripcion }}</small>
            </label>
        </div>
        @endforeach
    </div>
</div>
@endif
