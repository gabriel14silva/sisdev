<table class="table table-responsive-sm table-hover table-outline mb-0 table-sm">
    <thead class="thead-light">
        <tr>
            <th class="text-center">Identificador</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Hora de apertura</th>
            <th class="text-center">Hora de cierre</th>
            <th class="text-center">Monto de apertura</th>
            <th class="text-center">Monto de cierre</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Caja</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>
   
    @foreach ($cajas as $item)
        <tbody>
            <tr>
                <td class="text-center">{{strtoupper($item->codigo)}}</td>
                <td class="text-center">{{$item->fecha}}</td>
                <td class="text-center">{{$item->hora}}</td>
                <td class="text-center">
                    @if (!$item->hora_cierre)
                    <span class="badge badge-dark">Aun no cerrada</span>
                    @else
                        {{$item->hora_cierre}}
                    @endif        
                </td>
                <td class="text-center">{{$config->prefijo_moneda}}{{$item->monto}} {{$config->currency}}</td>
                <td class="text-center">
                    @if ($item->monto_cierre == '0.00' || !$item->monto_cierre)
                        <span class="badge badge-dark">Aun no cerrada</span>
                    @else
                    {{$config->prefijo_moneda}}{{$item->monto_cierre}} {{$config->currency}}
                    @endif
                </td>
                <td class="text-center">{{$item->estado}}</td>
                <td class="text-center">{{$item->caja}}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="c-icon" style="max-width: 64px">
                                <use xlink:href="/sprites/linear.svg#cil-settings">
                                    <svg id="cil-settings" viewBox="0 0 512 512">
                                        <path d="M245.1511,168a88,88,0,1,0,88,88A88.1,88.1,0,0,0,245.1511,168Zm0,144a56,56,0,1,1,56-56A56.0632,56.0632,0,0,1,245.1511,312Z" class="cls-1"></path>  <path d="M464.697,322.3193l-31.7695-26.1538a193.0943,193.0943,0,0,0,0-80.331l31.7695-26.1538a19.9409,19.9409,0,0,0,4.6065-25.4385l-32.6123-56.4834a19.9376,19.9376,0,0,0-24.337-8.73l-38.5615,14.4468a192.0446,192.0446,0,0,0-69.54-40.1919l-6.7627-40.57A19.9358,19.9358,0,0,0,277.7625,16H212.54a19.9357,19.9357,0,0,0-19.7275,16.7119L186.05,73.2837a192.045,192.045,0,0,0-69.54,40.1919L77.9451,99.0273a19.9366,19.9366,0,0,0-24.334,8.7305L20.9978,164.2446a19.94,19.94,0,0,0,4.61,25.4385l31.7666,26.1514a193.09,193.09,0,0,0,0,80.331l-31.77,26.1538a19.9408,19.9408,0,0,0-4.6064,25.4385l32.6123,56.4834a19.9369,19.9369,0,0,0,24.3369,8.73L116.51,398.5244a192.0436,192.0436,0,0,0,69.54,40.1919l6.7627,40.57A19.9356,19.9356,0,0,0,212.54,496h65.2227A19.9359,19.9359,0,0,0,297.49,479.2881l6.7627-40.5718a192.0432,192.0432,0,0,0,69.54-40.1919l38.5645,14.4483a19.937,19.937,0,0,0,24.334-8.73l32.6132-56.4868A19.94,19.94,0,0,0,464.697,322.3193Zm-50.6357,57.12-48.1094-18.024-7.2852,7.334a159.9528,159.9528,0,0,1-72.625,41.9727l-10.0039,2.6362L267.5964,464H222.7058l-8.4414-50.6421-10.0039-2.6362a159.9533,159.9533,0,0,1-72.625-41.9727l-7.2852-7.334L76.241,379.439,53.7947,340.5615l39.6289-32.624-2.7031-9.9722a160.8885,160.8885,0,0,1,0-83.9306l2.7031-9.9722L53.7947,171.439,76.241,132.561,124.35,150.585l7.2852-7.334a159.9533,159.9533,0,0,1,72.625-41.9727l10.0039-2.6362L222.7058,48h44.8906l8.4414,50.6421,10.0039,2.6362a159.9528,159.9528,0,0,1,72.625,41.9727l7.2852,7.334,48.1094-18.024,22.4463,38.8775-39.6289,32.624,2.7031,9.9722a160.8913,160.8913,0,0,1,0,83.9306l-2.7031,9.9722,39.6289,32.6235Z" class="cls-1"></path>
                                    </svg>
                                </use>
                            </svg>
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="will-change: transform; margin: 0px;">
                            @if ($item->idusers == auth()->user()->id && $item->estado == 'Abierta')
                                <a class="dropdown-item" href="{{route('cerrar_caja.contabilidad',$item->id)}}">
                                <svg class="c-icon" style="max-width: 64px">
                                    <use xlink:href="/sprites/linear.svg#cil-expand-down">
                                        <svg id="cil-expand-down" viewBox="0 0 512 512">
                                            <rect width="480" height="32" x="16" y="16" class="cls-1"></rect>  <path d="M16,496H496V368H16Zm32-96H464v64H48Z" class="cls-1"></path>  <path d="M416,96H96v37.86L255.9233,303.2236,416,135.9214ZM256.0767,256.7764,134.478,128H379.291Z" class="cls-1"></path>
                                        </svg>
                                    </use>
                                </svg>
                                </svg> &nbsp;Cerrar caja</a>
                            @else
                            <button class="dropdown-item" disabled title="Solo">
                                <svg class="c-icon" style="max-width: 64px">
                                    <use xlink:href="/sprites/linear.svg#cil-expand-down">
                                        <svg id="cil-expand-down" viewBox="0 0 512 512">
                                            <rect width="480" height="32" x="16" y="16" class="cls-1"></rect>  <path d="M16,496H496V368H16Zm32-96H464v64H48Z" class="cls-1"></path>  <path d="M416,96H96v37.86L255.9233,303.2236,416,135.9214ZM256.0767,256.7764,134.478,128H379.291Z" class="cls-1"></path>
                                        </svg>
                                    </use>
                                </svg>
                                </svg> &nbsp;Cerrar caja</button>
                            @endif
                            
                        
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    @endforeach
   
</table>
<div class="row mt-4">
    {{$cajas->render()}}
</div>