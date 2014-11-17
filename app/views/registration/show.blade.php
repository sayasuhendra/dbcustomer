@extends('layouts/scaffold')

@section('main')
    <div class="starter-template">

        <div class="col-md-4 col-md-offset-4">
        <h4>Selamat Anda telah berhasil mendaftar.</h4> <br><br>
        <p>Tunggu account Anda diaktivasi oleh Admin. <br>
        Setelah aktif Mohon untuk membuat data Anda lebih lengkap di menu "Create Profile". Terima kasih. <br><br>
        Berikut data yang Anda buat saat ini:
        </p>

            <dl class="dl-horizontal">
                <dt>Username</dt>
                <dd>{{{ $input->username }}}</dd>
                <dt>Nama_lengkap</dt>
                <dd>{{{ $input->nama_lengkap }}}</dd>
                <dt>Level</dt>
                <dd>{{{ $input->level }}}</dd>
                <dt>Bagian</dt>
                <dd>{{{ $input->bagian }}}</dd>
                <dt>Area</dt>
                <dd>{{{ $input->area }}}</dd>
                <dt>Email</dt>
                <dd>{{{ $input->email }}}</dd>
                <dt>Password</dt>
                <dd>{{{ $input->password }}}</dd>
            </dl>

        </div>

        
    </div>
    
@stop