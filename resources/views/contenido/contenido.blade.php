@extends('principal')
@section('contenido')
@if(Auth::check())
@if (Auth::user()->idrol == 1)
        <template v-if="menu==0">            
            <dashboard></dashboard> 
            {{-- <venta></venta> --}}
        </template>

        <template v-if="menu==1">
            <categoria></categoria>
            
        </template>

        <template v-if="menu==2">
            <producto></producto>
        </template>
        <template v-if="menu==3">
            <presentacion></presentacion>    
        </template>
        <template v-if="menu==4">
            <laboratorio></laboratorio>
        </template>

        <template v-if="menu==5">
            {{-- <ingreso></ingreso> --}}
            <ingreso></ingreso>
        </template>

        <template v-if="menu==6">
        <proveedor></proveedor>
        </template>

        <template v-if="menu==7">
            <venta></venta> 
            {{-- <h3>venta</h3> --}}
        </template>

        <template v-if="menu==8">
            <cliente></cliente>
        
        </template>
        <template v-if="menu==9">
            <empleado></empleado>
        </template>

        <template v-if="menu==10">
            {{-- <user></user> --}}
            <user></user>
        </template>

        <template v-if="menu==11">
            {{-- <rol></rol> --}}
            <rol></rol>
        </template>

        <template v-if="menu==12">
            {{-- <consultaingreso></consultaingreso> --}}
            <h3>consultaingreso</h3>
        </template>

        <template v-if="menu==13">
            {{-- <consultaventa></consultaventa> --}}
            <h3>consultaventa</h3>
        </template>
        <center>

        <template v-if="menu==14">
            <style type="text/css">
                #portapdf {
                    width: 500px;
                    height: 500px;
                    border: 1px solid #696767;
                    margin: 0 auto;
                }
                </style>
            <center>
                <main class="main">
                    <div class="container-fluid">
                        <h1 class="text-center">Ayuda</h1>
                        <h3 class="text-center">
                            Para obtener ayuda sobre como utilizar descarga el manual dando clik al boton abrir
                        </h3>
                        <div id="portapdf">
                            <object data="{{ asset("pdf/administrador.pdf")}}" type="application/pdf" width="500px" height="500px"></object>
                        </div> 
                        
                    </div>
                </main>
            </center>    
            
        </template>
    </center>


@elseif (Auth::user()->idrol == 2)
<template v-if="menu==0">            
    <dashboard></dashboard> 
    {{-- <venta></venta> --}}
</template>
    <template v-if="menu==7">
        <venta></venta> 
    {{-- <h3>venta</h3> --}}
    </template>
    <template v-if="menu==8">
        <cliente></cliente>
    
    </template>
    <template v-if="menu==13">
        {{-- <consultaventa></consultaventa> --}}
        <h3>consultaventa</h3>
    </template>
    <template v-if="menu==14">
        <style type="text/css">
            #portapdf {
                width: 500px;
                height: 500px;
                border: 1px solid #696767;
                margin: 0 auto;
            }
            </style>
            <center>
                <main class="main">
                <div class="container-fluid">
                    <h1 class="text-center">Ayuda</h1>
                    <h3 class="text-center">
                        Para obtener ayuda sobre como utilizar descarga el manual dando clik al boton abrir
                    </h3>
                    <div id="portapdf">
                        <object data="{{ asset("pdf/vendedor.pdf")}}" type="application/pdf" width="500px" height="500px"></object>
                    </div>
                </div>
            </main>
            <center>
    </template>
@elseif (Auth::user()->idrol == 3)
    <template v-if="menu==1">
        <categoria></categoria>
        
    </template>

    <template v-if="menu==2">
        <producto></producto>
    </template>
    <template v-if="menu==3">
        <presentacion></presentacion>    
    </template>
    <template v-if="menu==4">
        <laboratorio></laboratorio>
    </template>

    <template v-if="menu==5">
        {{-- <ingreso></ingreso> --}}
        <ingreso></ingreso>
    </template>
    <template v-if="menu==6">
        <proveedor></proveedor>
    </template>
    {{-- <template v-if="menu==12">
        <consultaingreso></consultaingreso>
    </template> --}}
    <center>    
        <template v-if="menu==14">
            <style type="text/css">
                #portapdf {
                    width: 500px;
                    height: 500px;
                    border: 1px solid #696767;
                    margin: 0 auto;
                }
                </style>
            
            <main class="main">
                <div class="container-fluid">
                    <h1 class="text-center">Ayuda</h1>
                    <h3 class="text-center">
                        Para obtener ayuda sobre como utilizar descarga el manual dando clik al boton abrir
                    </h3>
                    <div id="portapdf">
                        <object data="{{ asset("pdf/almacenero.pdf")}}" type="application/pdf" width="500px" height="500px"></object>
                    </div>
                </div>
            </main>
        </template>
    </center>

@else

@endif

@endif


@endsection