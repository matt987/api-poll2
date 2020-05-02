@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Response
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($response, ['route' => ['responses.update', $response->id], 'method' => 'patch']) !!}

                        @include('responses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection