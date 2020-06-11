@extends('layouts.master')

@section('title', 'Nouvelle esèpce')

@section('content')
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <h1>Nouvelle esèpce</h1>
                <div class="top-right-button-container mb-4">
                    <button data-url="{{ route('fishes.index') }}" type="button" class="btn btn-primary btn-lg top-right-button link-type">Esèpces</button>
                </div>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('fishes.index') }}">Esèpces</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nouvelle esèpce</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

		<form action="{{ route('fishes.store') }}" method="post" enctype="multipart/form-data">
			@csrf
		    <div class="row">
		    	<div class="col-md-3">
		    		<div class="card mb-4">
	                    <div class="card-body text-center">
	                        <h5 class="text-left">Image</h5>
	                        <div class="separator mb-4"></div>
	                    	<img id="fish-picture" style="height: 250px; width: 100%;" src="https://via.placeholder.com/250/100" >
	                    	<input type="file" class="hide" name="picture" id="file-fish-picture">
	                    </div>
	                    <div class="card-footer bg-white">
	                    	<button id="select-fish-picture" type="button" class="btn btn-primary btn-block">Choisir une image</button>
	                    </div>
	                </div>
		    	</div>


		    	<div class="col-md-9">
		    		<div class="card mb-4">
	                    <div class="card-body">
	                        <h5>Informations</h5>
	                    	<div class="separator mb-4"></div>	                        
	                        <div class="row">
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="scientific_name">Nom scientifique</label>
		                                <input type="text" class="form-control @error('scientific_name') is-invalid @enderror" name="scientific_name" id="scientific_name" value="{{ old('scientific_name') }}" placeholder="Nom scientifique">
		                            	@error('scientific_name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="french_name">Nom en français</label>
		                                <input type="text" class="form-control @error('french_name') is-invalid @enderror" name="french_name" id="french_name" value="{{ old('french_name') }}" placeholder="Nom en français">
		                            	@error('french_name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="category_id">Catégorie</label>
		                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
		                                	@foreach ($categories as $category)
		                                		<option value="{{ $category->id }}">{{ $category->name }}</option>
		                                	@endforeach
		                                </select>
		                            	@error('category_id')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for="commercial_size">taille marchande</label>
		                                <input type="text" class="form-control @error('commercial_size') is-invalid @enderror" name="commercial_size" id="commercial_size" value="{{ old('commercial_size') }}" placeholder="taille marchande">
		                            	@error('commercial_size')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>
	                        </div>

	                        <div class="form-group">
                                <label for="measurement_standards">Mensurations</label>
                                <textarea class="form-control @error('measurement_standards') is-invalid @enderror" name="measurement_standards" id="measurement_standards"  placeholder="Mensurations" cols="30" rows="10">{{ old('measurement_standards') }}</textarea>
                            	@error('measurement_standards')
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

@section('custom-javascript')
	<script type="text/javascript">
		$(document).ready(function () {
			$('#select-fish-picture').click(function () {
				$('#file-fish-picture').click();
			});
			
			$('#file-fish-picture').change(function () {
				$('#fish-picture').attr(
					'src', window.URL.createObjectURL(this.files[0])
				);
			});
		})
	</script>
@endsection