@extends('layouts.master')

@section('title', 'Editer ' . $infraction->name)

@section('content')
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <h1>Editer : {{ $infraction->name }}</h1>
                <div class="top-right-button-container mb-4">
                    <button data-url="{{ route('infractions.index') }}" type="button" class="btn btn-primary btn-lg top-right-button link-type">Liste des infractions</button>
                </div>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('infractions.index') }}">infractions</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $infraction->name }}</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

		<form action="{{ route('infractions.update', ['id' => $infraction->id]) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="card mb-4">
	                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Infraction</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $infraction->name) }}" placeholder="infraction">
                            	@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="article">Article</label>
                                <input type="text" class="form-control @error('article') is-invalid @enderror" name="article" id="article" value="{{ old('article', $infraction->article) }}" placeholder="Article">
                            	@error('article')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Contenu</label>
                                <textarea cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Contenu">{{ old('content', $infraction->content) }}</textarea>
                            	@error('content')
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
			$('#select-user-picture').click(function () {
				$('#file-user-picture').click();
			});
			
			$('#file-user-picture').change(function () {
				$('#user-picture').attr(
					'src', window.URL.createObjectURL(this.files[0])
				);
			});
		})
	</script>
@endsection