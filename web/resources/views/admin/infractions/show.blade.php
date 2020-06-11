@extends('layouts.master')

@section('title', 'infraction : ' . $infraction->name)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>infraction : {{ $infraction->name }}</h1>
                <div class="text-zero top-right-button-container">
                    <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ACTIONS
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('infractions.edit', ['id' => $infraction->id]) }}">Editer</a>
                        <form method="post" action="{{ route('infractions.destroy', ['id' => $infraction->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a class="dropdown-item btn-delete-resource redirect-after-confirmation" data-confirmation-message="Voulez vous vraiment supprimer ce l'infraction : {{ $infraction->name }} ?" href="{{ route('infractions.destroy', ['id' => $infraction->id]) }}">Supprimer</a>
                        </form>
                    </div>
                </div>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('infractions.index') }}">infractions</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $infraction->name }}</li>
                    </ol>
                </nav>
                <div class="separator mb-4"></div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-9">
                <div class="col-12 col-right">
                    <div class="row mb-3">
                        <div class="card w-100">
                            <div class="card-body">
                                <table class="table table-bordered table-show mb-0"> 
                                    <tr>
                                        <th class="bg-gray">Infraction</th>
                                        <td>{{ $infraction->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-gray">Article</th>
                                        <td>{{ $infraction->article }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-gray">Contenu</th>
                                        <td>{{ $infraction->content }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection