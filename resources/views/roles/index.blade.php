@extends('layouts.app')

@section('title')
صلاحيات المستخدمين

@endsection

@section('content')
<div class="row" dir="rtl">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>ادارة الصلاحيات</h2>
</div>
<div class="pull-right">

<a class="btn btn-success" href="{{ route('roles.create') }}"> انشاء صلاحية جديدة</a>

</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered" dir="rtl" >
<tr>
<th>#</th>
<th>الاسم</th>
<th width="280px">الحدث</th>
</tr>
@foreach ($roles as $key => $role)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $role->name }}</td>
<td>
<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>

<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>




{!! Form::close() !!}

</td>
</tr>
@endforeach
</table>
{!! $roles->render() !!}

@endsection
