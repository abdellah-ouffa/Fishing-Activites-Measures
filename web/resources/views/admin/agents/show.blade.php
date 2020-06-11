@extends('layouts.master')

@section('title', 'Agent : ' . $agent->full_name)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Agent : {{ $agent->user->full_name }}</h1>
                <div class="text-zero top-right-button-container">
                    <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ACTIONS
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('agents.edit', ['id' => $agent->id]) }}">Editer</a>
                        <form method="post" action="{{ route('agents.destroy', ['id' => $agent->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a class="dropdown-item btn-delete-resource redirect-after-confirmation" data-confirmation-message="Voulez vous vraiment supprimer ce l'Agent : {{ $agent->user->full_name }} ?" href="{{ route('agents.destroy', ['id' => $agent->id]) }}">Supprimer</a>
                        </form>
                    </div>
                </div>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('agents.index') }}">Agents</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $agent->user->full_name }}</li>
                    </ol>
                </nav>
                <div class="separator mb-4"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <div class="text-center pt-2">
                                <p class="list-item-heading pt-2 text-bold">
                                    <strong>{{ $agent->user->full_name }}</strong>
                                </p>
                            </div>
                            <p class="text-center">
                                {!! $agent->user->is_active_badge !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="col-12 col-right">
                    <div class="row mb-3">
                        <div class="card w-100">
                            <div class="card-body">
                                <h5>Informations personnel</h5>
                                <div class="separator mb-4"></div>
                                <table class="table table-bordered table-show mb-0"> 
                                    <tr>
                                        <th class="bg-gray">Prénom & Nom</th>
                                        <td>{{ $agent->user->full_name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="card w-100">
                            <div class="card-body">
                                <h5>Accès au plateforme <span class="text-danger text-small">[Mobile]</span></h5>
                                <div class="separator mb-4"></div>
                                <table class="table table-bordered table-show mb-0"> 
                                    <tr>
                                        <th class="bg-gray">PPR</th>
                                        <td>{{ $agent->user->ppr_number }}</td>
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