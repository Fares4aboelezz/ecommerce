@extends('layouts.app')
@section('content')
<div class="row" dir="rtl">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> عرض الصلاحيات</h2>
</div>
<br>
<div class="pull-right" dir="rtl">
<a class="btn btn-primary" href="{{ route('roles.index') }}"> العودة</a>
</div>
<br>
</div>
</div>
<div class="row" dir="rtl">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong >الاسم</strong>
{{ $role->name }}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>الصلاحيات</strong>
<br>
@if(!empty($rolePermissions))
@foreach($rolePermissions as $v)
<label class="label label-success">{{ $v->name }}</label><br>
@endforeach
@endif
</div>
</div>
</div>
@endsection
