@extends('layouts.master')

@section('title', 'Liste des infractions')

@section('content')
    {{-- Start listing of data --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>infractions</h1>
                    <div class="top-right-button-container">
                        <button data-url="{{ route('infractions.create') }}" type="button" class="btn btn-primary btn-lg top-right-button link-type">Nouvelle infraction</button>
                    </div>
                </div>
                <div class="separator mb-5"></div>
                <div class="list disable-text-selection" data-check-all="checkAll">
                    @forelse ($infractions as $infraction)
                        <div class="card d-flex flex-row mb-3">
                            <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                    <a href="{{ route('infractions.show', ['id' => $infraction->id]) }}" class="w-15 w-sm-100">
                                        <p class="list-item-heading mb-1 truncate">{{ $infraction->name }}</p>
                                    </a>
                                    <p class="mb-1 text-small text-muted text-center w-20 w-sm-100">
                                        {{ $infraction->article }}    
                                    </p>
                                    <div class="btn-group mb-1">
                                        <button class="btn btn-xs btn-danger dropdown-toggle btn-toggle-without-icon" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="simple-icon-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a class="dropdown-item" href="{{ route('infractions.show', ['id' => $infraction->id]) }}">Details</a>
                                            <a class="dropdown-item" href="{{ route('infractions.edit', ['id' => $infraction->id]) }}">Editer</a>
                                            <form method="post" action="{{ route('infractions.destroy', ['id' => $infraction->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item btn-delete-resource redirect-after-confirmation" data-confirmation-message="Voulez vous vraiment supprimer l'infraction : {{ $infraction->name }} ?" href="#">Supprimer</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- empty expr --}}
                    @endforelse
                    {!! $infractions->links('vendor.pagination.default') !!}
                </div>
            </div>
        </div>
    </div> 
    {{-- End listing of data --}}
@endsection