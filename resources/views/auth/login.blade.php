@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <form class="border p-4 rounded" method="post" action="{{ route('login.login') }}">
                @csrf
                <h3 class="text-center mb-4">Login</h3>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary d-block w-100">Login</button>
            </form>
        </div>
    </div>
</div>
  @endsection
