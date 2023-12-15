@extends('layouts.app')
@section('content')
<div class="row" dir="rtl">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>تعديل المستخدم</h2>
</div>
<div class="pull-right" dir="rtl">
<a class="btn btn-primary" href="{{ route('users.index') }}"> الرجوع</a>
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
{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row" dir="rtl">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>الاسم</strong>
{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>البريد الالكتونى</strong>
{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>كلمة المرور</strong>
{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>تأكيد كلمة المرور</strong>
{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>الدور</strong>
{!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">ارسال</button>
</div>
</div>
{!! Form::close() !!}

@endsection
