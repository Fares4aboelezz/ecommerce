@extends('layouts.app')
@section('content')
<div class="row" dir="rtl">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>انشاء صلاحية جديدة</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('roles.index') }}"> العودة</a>
</div>
</div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row" dir="rtl">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>الاسم</strong>
{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>الصلاحية</strong>
<br/>
@foreach($permission as $value)
<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
{{ $value->name }}</label>
<br/>
@endforeach
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">ارسال</button>
</div>
</div>
{!! Form::close() !!}
<p class="text-center text-primary"><small></small></p>
@endsection
