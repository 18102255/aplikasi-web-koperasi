@extends('layout/aplikasi')

@section('konten')
        <div class="w-50 center border rounded rounded px-3 py-3 mx-auto">
            <hi>login<hi/>
            <form action="/sesi/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="from label">username</label>
                <input type="username" value="{{ Session::get('username')}}"username" class="from-controller">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="nama" class="form-contro">
                    </div>
            </form>
            </div>
            <div class="mb-3 d-grid">
                <butto name="sumbit" type="submit" class="btn btn-primary">login</button>
                </div>
            @endsection