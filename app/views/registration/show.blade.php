@extends('sessions/master')

@section('atas')

    <style>
        .putih {
            color: white;
        }
        .kotak {
            margin-top: 40px;
            background-color: #eceef1;
        }
        .jarak {
            padding: 20px;
            font-weight: 400;
            font-size: 14px;
        }
    </style>
    
@stop

@section('main')
    <div class="starter-template">

        <div class="col-md-4 col-md-offset-4 kotak">
            <div class="jarak">
                <h3 align="center">Selamat ! <br><br> Anda telah berhasil mendaftar.</h3><br>
                <p>Silahkan check email Anda untuk mengkonfirmasi dan mengaktifkan account Anda. <br>
                Setelah aktif. Mohon untuk lengkapi data dan foto Anda di menu kanan atas "Profile" "Edit Your Profile". Terima kasih. <br><br>
                Berikut data yang Anda buat saat ini:
                </p>

                <dl class="dl-horizontal">
                    <dt>Username</dt>
                    <dd>{{{ $input->username }}}</dd>
                    <dt>Nama Lengkap</dt>
                    <dd>{{{ $input->nama_lengkap }}}</dd>
                    <dt>Level</dt>
                    <dd>{{{ $input->level }}}</dd>
                    <dt>Bagian</dt>
                    <dd>{{{ $input->bagian }}}</dd>
                    <dt>Area</dt>
                    <dd>{{{ $input->area }}}</dd>
                    <dt>Extention</dt>
                    <dd>{{{ $input->extention }}}</dd>
                    <dt>PIN BBM</dt>
                    <dd>{{{ $input->bbm }}}</dd>
                    <dt>Handphone</dt>
                    <dd>{{{ $input->hp }}}</dd>
                    <dt>Whatsapp</dt>
                    <dd>{{{ $input->wa }}}</dd>
                    <dt>Email</dt>
                    <dd>{{{ $input->email }}}</dd>
                    <dt>Password</dt>
                    <dd>{{{ $input->password }}}</dd>
                </dl>
            </div>

        </div>

        
    </div>
    
@stop