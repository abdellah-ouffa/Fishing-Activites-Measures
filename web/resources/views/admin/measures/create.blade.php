@extends('layouts.master')

@section('title', 'Nouvelle esèpce')

@section('content')
	<div class="container-fluid">
		<div class="row">
            <div class="col-12">
                <h1>Measures</h1>
                <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb pt-0">
                        <li class="breadcrumb-item">
                            <a href="#">Tableau de board</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nouvelle esèpce</li>
                    </ol>
                </nav>
                <div class="separator mb-5"></div>
            </div>
        </div>

		<form action="{{ route('measures.store') }}" method="post" enctype="multipart/form-data">
			@csrf
    		<div class="card mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="measure_name" class="form-control input-lg" placeholder="Measure name ...">
                    </div>
                	<table class="table table-bordered table-striped">
                		<tr>
                			<th width="20%">Espèce</th>
                			<th>
                				<select name="fishes[]" class="form-control select2-multiple" id="fishes"  multiple="multiple" data-width="100%">
                					@foreach ($fishes as $fish)
                						<option value="{{ $fish->id }}">{{ $fish->french_name }}</option>
                					@endforeach
                				</select>
                			</th>
                		</tr>
                		@foreach (Constant::DEFAULT_MEASURE_ATTRIBUTES as $key => $attribute)
                			<tr>
                				<th width="20%">{{ $attribute }}</th>
                				<td data-key="{{ $key }}" data-origin-key="{{ $key }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select name="zones[{{ $key }}][{{ $key }}][]" class="form-control select2-multiple" id="zones"  multiple="multiple" data-width="100%">
                                                @foreach ($zones as $zone)
                                                    <option value="{{ $zone->id }}">{{ $zone->location }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="value[{{ $key }}][]" id="" class="form-control" cols="30" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" id="add-attribute-value" class="btn btn-warning btn-sm default add-attribute-value">
                                                <i class="simple-icon-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                				</td>
                			</tr>
                		@endforeach
                	</table>
                    <button type="submit" class="float-right btn btn-primary mb-0">Enregistrer</button>
                </div>
            </div>			
		</form>
	</div>
@endsection


@section('custom-stylesheet')
      <link rel="stylesheet" href="{{ asset('assets/css/vendor/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/vendor/select2-bootstrap.min.css') }}">
@endsection


@section('plugin-javascript')
	<script src="{{ asset('assets/js/vendor/select2.full.js') }}"></script>
@endsection


@section('custom-javascript')
	<script>
		$(document).ready(function () {
			// Init
			$(".select2-multiple").select2({theme:"bootstrap",placeholder:"",maximumSelectionSize:6,containerCssClass:":all:"});

            // Events 
            $('body').on("click", ".add-attribute-value", function () {
                var originKey = $(this).parent().parent().parent().data('origin-key');
                var key = $(this).parent().parent().parent().data('key');
                var nextKey = key + 1;
                $(this).parent().parent().parent().data('key', nextKey);

                var htmlAttrubute  = `<div class="row"> <div class="col-md-12"><hr></div> <div class="col-md-5"> <select name="zones[`+ originKey +`][`+ (nextKey) +`][]" class="form-control select2-multiple" id="zones" multiple="multiple" data-width="100%"> @foreach ($zones as $zone) <option value="{{ $zone->id }}">{{ $zone->location }}</option> @endforeach </select> </div> <div class="col-md-6"> <textarea name="value[`+ originKey +`][]" id="" class="form-control" cols="30" rows="2"></textarea> </div> <div class="col-md-1"> <button type="button" class="btn btn-danger btn-sm default remove-attribute-value"> <i class="simple-icon-minus"></i> </button> </div> </div>`;
                $(this).parent().parent().parent().append(htmlAttrubute);
                $(".select2-multiple").select2({theme:"bootstrap",placeholder:"",maximumSelectionSize:6,containerCssClass:":all:"});
            });

            $('body').on("click", ".remove-attribute-value", function () {
                $(this).parent().parent().remove();
            });
		});
	</script>
@endsection