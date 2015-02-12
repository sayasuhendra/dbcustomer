@extends('sessions/master')


@section('main')

<div class="content">


<form action="{{ action('RemindersController@postRemind') }}" method="post">
    <h3>Forget Password ?</h3>
    <p>
         Enter your e-mail address below to reset your password.
    </p>
    <div class="form-group">
        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
        {{ errors_for('email', $errors) }}
    </div>

    @if(Session::has('error'))
        <p style="color: red;"> Maaf, Tidak Ada Pengguna dengan Email yang Anda Masukkan. <br> Silahkan Masukkan Email Lain.<br> Atau Silahkan <a href="/register" class="btn btn-sm btn-success">Mendaftar.</a> </p>
    @elseif (Session::has('status'))
        <p>Silahkan Cek Email Anda dan Klik Link yang Kami Kirim untuk Mereset Password Anda.</p>
    @endif
    
    <div class="form-actions">
        <a href="{{ route('login') }}"><button type="button" id="back-btn" class="btn btn-default">Back</button></a>
        <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
</form>

</div>
@stop