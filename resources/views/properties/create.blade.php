@extends('layouts/app')

@section('content')
    <div class="container">
       Bonjour {{ request('name') }}

        <form action="">
            <input type="text" name="name">

            <button class="btn btn-primary">Envoyer</button>
        </form>
        <h2>FORMULAIRE EN POST</h2>
        <form action="" method="POST">
            <input type="text" name="name">
            <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>

@endsection
