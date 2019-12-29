@extends('main')
@section('title','Configuration')

@section('content')
<div class="row">
 <div class="col-md-12">
  <h1>Configuration</h1>
  <p>Modify some of the page content and settings here.</p>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
  <table class="table table-striped config">
   
   <tbody>
    @foreach ($configs as $config)
    <tr>
     <td>
      {!! Form::model($config, ['route' => ['config.update', $config->id], 'method' => 'PUT', 'files' => true]) !!}
      {{ Form::label($config->name, $config->name) }}
      @if ($config->type === 'file')
      <span>
      {{ Form::text($config->name, $config->value, ["id" => "id_".$config->id, "class" => 'form-control input']) }}
      <input style="color:rgba(1,1,1,0)" type='file' name="fileupload" onchange="changeVal(this,{{ $config->id }})"></span>
      @elseif ($config->type === 'html')
      {{ Form::textarea($config->name, $config->value, ["class" => 'form-control input']) }}
      @else
      {{ Form::text($config->name, $config->value, ["class" => 'form-control input']) }}
      @endif
      <br><i>{{ $config->description }}</i>
     </td>
     <td>
      {{Form::button("<span class='glyphicon glyphicon-floppy-disk'></span> Change", array("type" => "submit","class" => "btn btn-success btn config_update"))}}
      {!! Form::close() !!}
     </td>
    </tr>
    
    @endforeach
   </tbody>
   
  </table>
  <div class="text-center">
   <h5>Update notification goes here.... (WiP)</h5>
  </div>
 </div>
</div>
<script>
function changeVal(thisval,thisid){
 document.getElementById("id_"+thisid).value=/[^\/|\\]*$/.exec(thisval.value)[0]
}
</script>
@endsection