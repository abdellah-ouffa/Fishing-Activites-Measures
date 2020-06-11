@extends('layouts.master')

@section('title', 'Zones')

@section('content')
    {{-- Start listing of data --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>Zones</h1>
                    <div class="top-right-button-container">
                        <button type="button" class="btn btn-primary btn-lg top-right-button" data-toggle="modal" data-target="#add-modal">New Zone</button>
                    </div>
                </div>
                <div class="separator mb-5"></div>
                <div class="list disable-text-selection" data-check-all="checkAll">
                    @forelse ($zones as $zone)
                        <div class="card d-flex flex-row mb-3">
                            <div class="pl-2 d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                    <a href="#" class="w-100 w-sm-100">
                                        <p class="list-item-heading mb-1 truncate">{{ $zone->location }}</p>
                                    </a>
                                    <div class="btn-group mb-1">
                                        <button class="btn btn-xs btn-danger dropdown-toggle btn-toggle-without-icon" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="simple-icon-settings"></i>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <form method="post" action="{{ route('zones.destroy', ['id' => $zone->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item btn-delete-resource redirect-after-confirmation" data-confirmation-message="Voulez vous vraiment supprimer la zone : {{ $zone->name }} ?" href="#">Supprimer</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- empty expr --}}
                    @endforelse
                </div>
            </div>
        </div>
    </div> 
    {{-- End listing of data --}}
    <div id="add-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="{{ route('zones.store') }}" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new zone</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="location">Location</label>
                            <textarea name="location" id="location" cols="30" ros="10" class="form-control" placeholder="Location"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
