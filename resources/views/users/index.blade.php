@extends('layouts.app')

@section('title')
المستخدمين
@endsection
@section('content')
<div class="row" dir="rtl">
<div class="col-lg-12 margin-tb" dir="rtl">
<div class="pull-left" dir="rtl">
<h2>ادارة المستخدمين</h2>
</div>
<div class="pull-right" dir="rtl">
<a class="btn btn-success" href="{{ route('users.create') }}"> انشاء مستخدم جديد</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered" dir="rtl">
<tr>
<th>#</th>
<th>اسم المستخدم</th>
<th>البريد الألكترونى</th>
<th>حالة المستخدم</th>
<th>نوع المستخدم</th>

</tr>
@foreach ($data as $key => $user)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{$user->status}}</td>
<td>{{$user->roles_name}}</td>


<td>
@if(!empty($user->getRoleNames()))
@foreach($user->getRoleNames() as $v)
<label class="badge badge-success">{{ $v }}</label>
@endforeach
@endif
</td>
<td>
<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">اظهار</a>
<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>
{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
{!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
</td>
</tr>
@endforeach
</table>
{!! $data->render() !!}

@endsection
