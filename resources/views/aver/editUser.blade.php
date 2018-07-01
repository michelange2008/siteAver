@extends('layouts.app')

@extends('aver.menuAdmin')

@section('content')
<br>
<div class="container">
  {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PATCH'])}}

    {{ Form::text('name',$user->name ,['class' => 'form-control'])}}
    <br>
    {{ Form::email('email',$user->email ,['placeholder' => 'adresse email', 'class' => 'form-control'])}}
    <br>
    {{ Form::password('password' , ['id' => 'mdp1', 'placeholder' => 'mot de passe', 'class' => 'form-control'])}}
    <br>
    {{ Form::password('confirm_password' , ['id' => 'mdp2', 'placeholder' => 'confirmer le mot de passe', 'class' => 'form-control'])}}
    <br>
    {{ Form::text('ede',$user->ede ,['placeholder' => 'numéro EDE', 'class' => 'form-control'])}}
    <br>
    {{ Form::submit('Enregistrer', ['class' => 'btn btn-sm btn-success'])}}
    {{ Form::reset('Annuler', ['class' => 'btn btn-sm btn-danger'])}}


  {{ Form::close()}}
</div>
@endsection
