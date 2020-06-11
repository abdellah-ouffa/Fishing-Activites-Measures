@extends('layouts.master')

@section('title', 'Ajouter nouveau agent')

@section('content')
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <h1>Nouveau agent</h1>
                <div class="top-right-button-container mb-4">
                    <button data-url="{{ route('agents.index') }}" type="button" class="btn btn-primary btn-lg top-right-button link-type">Liste des agents</button>
                </div>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('agents.index') }}">Agents</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau agent</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

		<form action="{{ route('agents.store') }}" method="post" enctype="multipart/form-data">
			@csrf
		    <div class="row">
		    	<div class="col-md-3">
	                <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Etat</h6>
							<div class="form-group position-relative mb-0">
			            		<div class="custom-switch custom-switch-primary-inverse mt-2">
			                        <input class="custom-switch-input" id="is-active" name="is_active" type="checkbox" checked>
			                        <label class="custom-switch-btn" for="is-active"></label>
			                    </div>
					        </div>
                        </div>
                    </div>
		    	</div>
		    	<div class="col-md-9">
		    		<div class="card mb-4">
	                    <div class="card-body">
	                        <h5>Informations personnel</h5>
	                    	<div class="separator mb-4"></div>	                        
	                        <div class="row">
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="first_name">Nom</label>
		                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Nom">
		                            	@error('first_name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="last_name">Prénom</label>
		                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Prénom">
		                            	@error('last_name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        </div>

	                        <h5 class="mt-4">Accès au plateforme <span class="text-danger text-small">[Mobile]</span></h5>
	                        <div class="separator mb-4"></div>
							<div class="form-group">
							    <label for="ppr_number">PPR</label>
							    <input type="text" class="form-control @error('ppr_number') is-invalid @enderror" name="ppr_number" id="ppr_number" value="{{ old('ppr_number') }}" placeholder="PPR">
								@error('ppr_number')
							        <span class="invalid-feedback" role="alert">
							            <strong>{{ $message }}</strong>
							        </span>
							    @enderror
							</div>

							<div class="mt-4"></div>
                            <button type="submit" class="float-right btn btn-primary mb-0">Enregistrer</button>
	                    </div>
	                </div>
		    	</div>
		    </div>
			
		</form>
	</div>
@endsection