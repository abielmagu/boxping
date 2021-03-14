<!-- Impresion de etiqueta - Inicio -->
<div class="mt-3" style="font-size:9pt;page-break-before:always">
    <table class="table table-sm table-bordered m-0 align-middle">
        <!-- App  -->
        <tbody>
            <tr class="table-dark">
                <td class="fw-bold text-white px-2" colspan="2">BOXPING | {{ config('app.name') }}</td>
            </tr>
        </tbody>

        <!-- Etiqueta -->
        <tbody>
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Guía</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Transportadora</td>
                <td class="px-2">{{ $salida->id ? $salida->transportadora->nombre : '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Rastreo</td>
                <td class="px-2">{{ $salida->id ? $salida->rastreo : '?' }}</td>
            </tr>
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Destino</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Destinatario</td>
                <td class="px-2">{{ $entrada->destinatario_id ? $entrada->destinatario->nombre : '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Teléfono</td>
                <td class="px-2">{{ $entrada->destinatario_id ? $entrada->destinatario->telefono : '?' }}</td>
            </tr>

            @if( $entrada->salida && $entrada->salida->cobertura === 'domicilio' )
            <tr>
                <td class="text-muted small px-2" style="width:1%">Dirección</td>
                <td class="px-2">{{ $entrada->destinatario_id ? $entrada->destinatario->direccion : '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Postal</td>
                <td class="px-2">{{ $entrada->destinatario_id ? $entrada->destinatario->codigo_postal : '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Localidad</td>
                <td class="px-2">{{ $entrada->destinatario_id ? $entrada->destinatario->localidad : '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Referencias</td>
                <td class="px-2">{{ $entrada->destinatario_id ? $entrada->destinatario->referencias : '?' }}</td>
            </tr>
            @endif

            <tr>
                <td class="text-muted small px-2" style="width:1%">Cobertura</td>
                <td class="px-2">
                    <p class="m-0 text-uppercase">{{ $entrada->salida ? $entrada->salida->cobertura : '?' }}</p>
                    @if( $salida->id && $salida->cobertura === 'ocurre' )
                    <p class="m-0">{{ $salida->direccion }}, Postal {{ $salida->postal }}</p>
                    <p class="m-0">{{ $salida->ciudad }}, {{ $salida->estado }}, {{ $salida->pais }}</p>
                    @endif
                </td>
            </tr>

            <!-- Medidas -->
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Medidas</td>
            </tr>
            @if( is_object($etapa) && $etapa->id )
            <tr>
                <td class="text-muted small px-2" style="width:1%">Etapa</td>
                <td class="px-2">{{ $etapa->nombre ?? '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Peso</td>
                <td class="px-2">{{ $etapa->pivot->peso ?? '' }} {{ $etapa->pivot->medida_peso ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Ancho</td>
                <td class="px-2">{{ $etapa->pivot->ancho ?? '' }} {{ $etapa->pivot->medida_volumen ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Altura</td>
                <td class="px-2">{{ $etapa->pivot->altura ?? '' }} {{ $etapa->pivot->medida_volumen ?? '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Largo</td>
                <td class="px-2">{{ $etapa->pivot->largo ?? '' }} {{ $etapa->pivot->medida_volumen ?? '' }}</td>
            </tr>

            @else
            <tr>
                <td class="text-center" colspan="2">Sin registro / Sin medidas</td>
            </tr>

            @endif
        </tbody>
    </table>
    <br>
    <p class="lead text-center">Código de barras o QR</p>
</div>
<!-- Impresion de etiqueta - Final -->
