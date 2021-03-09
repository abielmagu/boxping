@extends('printing')
@section('content')

<br>
<div class="" style="font-size:9pt">

    <table class="table table-sm table-bordered m-0 align-middle">
        <tbody>
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Guía</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Transportadora</td>
                <td class="px-2">{{ $salida->id ? $salida->transportadora->nombre : '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Folio</td>
                <td class="px-2">{{ $salida->folio ? $salida->folio : '?' }}</td>
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

            @if( $salida->id && $salida->cobertura === 'domicilio' )
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
                    <p class="m-0 text-uppercase">{{ $salida->id ? $salida->cobertura : '?' }}</p>
                    @if( $salida->id && $salida->cobertura === 'ocurre' )
                    <ul class="px-3 m-0">
                        <li>{{ $salida->direccion }}, Postal {{ $salida->postal }}</li>
                        <li>{{ $salida->ciudad }}, {{ $salida->estado }}, {{ $salida->pais }}</li>
                    </ul>
                    @endif
                </td>
            </tr>

            <!-- Medidas -->
            <tr>
                <td class="table-light small px-2" style="width:1%" colspan="2">Medidas</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Etapa</td>
                <td class="px-2">{{ $etapa->id ? $etapa->nombre : '?' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Peso</td>
                <td class="text-capitalize px-2">{{ $etapa->id ? $etapa->pivot->peso : '' }} {{ $etapa->id ? $etapa->pivot->medida_peso : '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Ancho</td>
                <td class="text-capitalize px-2">{{ $etapa->id ? $etapa->pivot->ancho : '' }} {{ $etapa->id ? $etapa->pivot->medida_volumen : '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Altura</td>
                <td class="text-capitalize px-2">{{ $etapa->id ? $etapa->pivot->altura : '' }} {{ $etapa->id ? $etapa->pivot->medida_volumen : '' }}</td>
            </tr>
            <tr>
                <td class="text-muted small px-2" style="width:1%">Largo</td>
                <td class="text-capitalize px-2">{{ $etapa->id ? $etapa->pivot->largo : '' }} {{ $etapa->id ? $etapa->pivot->medida_volumen : '' }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <p class="lead text-center">Código de barras o QR</p>
</div>

@endsection
