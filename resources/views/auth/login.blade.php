@extends('layouts.auth')

<div class="w-100 vh-100 d-flex align-items-center justify-content-center">
<form class="col-sm-8 col-lg-3" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="d-flex align-items-center mb-5">
        <img class="me-3" src="{{ asset('/img/logos/logo_emblem.png') }}" alt="Saeng Lányok" width="50" height="50">
        <h1 class="h1 mb-0">Saeng Lányok</h1>
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" id="email" type="email" name="email" required>
    </div>
    <div class="mb-4">
        <label class="form-label" for="password">Password</label>
        <input class="form-control" id="password" type="password" name="password" required>
    </div>
    <button class="w-100 btn btn-primary" type="submit">Belépés</button>
</form>
</div>
