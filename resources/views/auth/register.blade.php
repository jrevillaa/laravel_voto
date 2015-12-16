@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('form.signup.title') }}</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}

                        <div class="form-group">
                            <label>{{ trans('form.label.user') }}</label>
                            {!! Form::input('text', 'vch_usuario', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.name') }}</label>
                            {!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.lastname') }}</label>
                            {!! Form::input('text', 'lastname', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.email') }}</label>
                            {!! Form::email('vch_email', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.password') }}</label>
                            {!! Form::password('vch_password', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.password_confirmation') }}</label>
                            {!! Form::password('vch_password_confirmation', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.type') }}</label>
                            {!! Form::select('type', [1 => 'Usuario', 2 => 'Invitado', 3 => 'Completo'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.country') }}</label>
                            {!! Form::input('text', 'country', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>{{ trans('form.label.sex') }}</label>
                            <label>{!! Form::radio('sex', '0', true) !!} F</label>
                            <label>{!! Form::radio('sex', '1', null) !!} M</label>
                        </div>
                        <div>
                            {!! Form::submit(trans('form.signup.submit'),['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
