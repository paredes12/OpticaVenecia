@extends('layouts.panel')
@section('contenido')
<div class="table">
  <table  class="table table-bordered">
    <thead>
      <tr class="table-info">
        <th style="text-align: center;" scope="col">Optica Venecia</th>
        <th style="text-align: center;" colspan="3" scope="col">Fecha: {{$fecha}}</th>
        <th style="text-align: center;" colspan="6" scope="col">Planilla de pago quincenal</th>      
      </tr>
    </thead>
    <tbody>
      <tr>
        <th rowspan="2" style="vertical-align: middle;" scope="row">Nombre empleado</th>
        <td rowspan="2" style="vertical-align: middle;">Salario quincenal</td>    
        <td style="text-align: center;" colspan="4">Descuentos</td>          
        <td rowspan="2" style="vertical-align: middle;">Total con descuento</td>
        <td rowspan="2" style="vertical-align: middle;">Bono venta</td>
        <td rowspan="2" style="vertical-align: middle;">Vacación anual</td>
        <td rowspan="2" style="vertical-align: middle;">Total a pagar</td>
      </tr>
      <tr>            
        <td>ISSS</td>
        <td>AFP</td>
        <td>Anticipo</td>
        <td>Prestamo</td>
    
      </tr>
      <tr>
        @foreach($empleado as $row)
        <td>{{$row->nombre_empleado}} {{$row->apellido_empleado}}</td>
        <td>{{$row->salario_base}}</td>
        <td>{{$row->isss_planilla}}</td>
        <td>{{$row->afp_planilla}}</td>
        <td>{{$row->anticipo_planilla}}</td>
        <td>{{$row->prestamo_planilla}}</td>
        <td>{{$row->total_descuento}}</td>
        <td>{{$row->bono_venta_planilla}}</td>
        <td>{{$row->vacacion_anual}}</td>
        <td>{{$row->total_a_pagar}}</td>   
        </tr> 
        @endforeach
      
    </tbody>
  </table>
</div>
@endsection