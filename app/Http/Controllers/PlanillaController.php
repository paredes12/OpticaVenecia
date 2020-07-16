<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use DB;
use App\Empleado as empleado;
use App\Planilla as planilla;
use App\anticipo_planilla as anticipo;
use App\prestamo_planilla as prestamo;
class PlanillaController extends Controller
{
    public function planilla(){        
        $mytime = Carbon\Carbon::now();  
        $mytime->setlocale('es');
        $mytime->setTimezone('America/El_Salvador');
        $fecha=$mytime->isoFormat('D-MMMM-Y');                    
        
        if($mytime->isoFormat('D')==15 || $mytime->isoFormat('D')==30){            
            $this->generarPlanilla();
            $empleados=planilla::all();
            $empleados=$empleados->sortBy('fecha_pago_planilla')->last();     
            $empleado=planilla::where('fecha_pago_planilla',$empleados->fecha_pago_planilla)
                ->join('empleado','planilla.empleado_id','=','empleado.id')
                ->get();
            return view('layouts.planilla.planilla',compact('fecha','empleado'));             
            //return $empleado;
        }else{
            $empleados=planilla::all();
            $empleados=$empleados->sortBy('fecha_pago_planilla')->last();     
            $empleado=planilla::where('fecha_pago_planilla',$empleados->fecha_pago_planilla)
                ->join('empleado','planilla.empleado_id','=','empleado.id')
                ->get();            
            return view('layouts.planilla.planilla',compact('fecha','empleado'));  
        }
        
       
    }

    public function generarPlanilla(){
        $counter=0;
        $mytime = Carbon\Carbon::now();            
        $mytime->setTimezone('America/El_Salvador');
        $empleados=empleado::all();        
        foreach($empleados as $row){
            $registro=new planilla;
            $anticipo=\App\anticipo_planilla::where('empleado_id',$row->id)->first();
            $prestamo=\App\prestamo_planilla::where('empleado_id',$row->id)->first();            
            if($anticipo==''){
                $registro->anticipo_planilla=0;
            }else{
                $registro->anticipo_planilla=$anticipo->anticipo;
            }
            if($prestamo==''){
                $registro->prestamo_planilla=0;
            }else{
                $registro->prestamo_planilla=$prestamo->prestamo;
            }
            $registro->isss_planilla=($row->salario_base)*0.075;
            $registro->afp_planilla=($row->salario_base)*0.0725;
            $registro->bono_venta_planilla=0;
            $registro->vacacion_anual=0;
            $registro->fecha_pago_planilla=$mytime;
            $registro->empleado_id=$row->id;
            $registro->total_descuento=$registro->isss_planilla+$registro->afp_planilla+$registro->anticipo_planilla+$registro->prestamo_planilla;
            $registro->total_a_pagar=$row->salario_base-$registro->total_descuento;
            $mytime->setlocale('es');            
            $fecha=$mytime->isoFormat('Y-M-D'); 
            
            $planilla=planilla::where('fecha_pago_planilla',$fecha)->where('empleado_id',$registro->empleado_id)->first();            
            if($planilla==''){
                $registro->save();
            }                                
        }
    }
}
