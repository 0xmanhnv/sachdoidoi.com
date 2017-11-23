@extends('admin.layouts.master')

@section('head')

@endsection

@section('content')
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-12 connectedSortable">
				<div class="box box-default">
					<!-- Content Header (Page header) -->
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa fa-newspaper-o"></i> EDIT POST
						</h3>
					</div>
					@if(isset($post))
						<div class="box-body">
							<form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PUT">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
										  <label for="title-post">Title(<span style="color: red;">*</span>)</label>
										  	@if ($errors->has('title'))
			                                    <span class="help-block" style="color: red;">
			                                        <strong>{{ $errors->first('title') }}</strong>
			                                    </span>
			                                @endif
										  <input type="text" class="form-control" id="title-post" placeholder="Title .. " name="title" value="{{ $post->title }}">
										</div>
										<div class="form-group">
										  <label for="description-post">Description(<span style="color: red;">*</span>)</label>
										  	@if ($errors->has('description'))
			                                    <span class="help-block" style="color: red;">
			                                        <strong>{{ $errors->first('description') }}</strong>
			                                    </span>
			                                @endif
										  <textarea class="form-control" rows="5" id="description-post" placeholder="Description ... " name="description">{!! $post->description !!}</textarea>
										</div>
										<div class="form-group">
											<label for="content-post">Content(<span style="color: red;">*</span>)</label>
											@if ($errors->has('content'))
			                                    <span class="help-block" style="color: red;">
			                                        <strong>{{ $errors->first('content') }}</strong>
			                                    </span>
			                                @endif
											<textarea class="form-control" cols="50" rows="10" id="content-post" placeholder="Content..." name="content">{!! $post->content !!}</textarea>
										</div>
									</div>
									<div class="col-lg-4">
										<!-- STATUS POST-->
										<div class="box box-primary">
											<!-- Content Header (Page header) -->
											<div class="box-header with-border">
												<h3 class="box-title">
													<i class="fa fa-bookmark" aria-hidden="true"></i> STATUS
												</h3>
											</div>
											<div class="box-body">
												<div class="form-group">
													<select class="form-control" id="sel1" name="status">
														<option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Publish</option>
														<option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Draft</option>
													</select>
												</div> 
												<div class="form-group">
													<label class="checkbox-inline">
														<input name="is_featured" type="checkbox" value="1" {{ $post->is_featured == 1 ? 'checked' : '' }}> Featured
													</label>
													<div class="pull-right">
														<button type="submit" class="btn btn-primary">PUBLISH</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END STATUS POST -->
										<!-- CATEGORIES -->
										<div class="box box-primary">
											<!-- Content Header (Page header) -->
											<div class="box-header with-border">
												<h3 class="box-title">
													<i class="fa fa-list" aria-hidden="true"></i> CATEGORIES
												</h3>
											</div>
											<div class="box-body">
												<div class="form-group">
													<select class="form-control" id="sel1" name="category_id">
														@if(isset($categories))
															@foreach ($categories as $category)
																<option value="{{ $category->id }}" {{ $category->id == $post->category->id ? 'selected' : '' }}>
																	{{ $category->name }}
																</option>
															@endforeach
														@endif
													</select>
												</div> 
											</div>
										</div>
										<!-- END CATEGORIES -->
										<!-- THUMBNAIL -->
										<div class="box box-primary">
											<!-- Content Header (Page header) -->
											<div class="box-header with-border">
												<h3 class="box-title">
													<i class="fa fa-picture-o" aria-hidden="true"></i> THUMBNAIL
												</h3>
											</div>
											<div class="box-body">
												<div class="thumbnail">
													<img src="{{ $post->thumbnail }}" alt="@if( $post->thumbnail != '') {{ 'No Image' }} @else {{ $post->thumbnail }} @endif" alt="No Image" style="width: 250px; height: 200px;" id="holder">
													<input id="thumbnail" class="form-control" type="hidden" name="thumbnail" style="width: 250px; height: 200px;">
												</div>
												<button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i>CHOOSE</button>
											</div>
										</div>
										<!-- END THUMBNAIL -->
										<!-- TAGS -->
										<div class="box box-primary">
											<!-- Content Header (Page header) -->
											<div class="box-header with-border">
												<h3 class="box-title">
													<i class="fa fa-tags" aria-hidden="true"></i> TAG
												</h3>
											</div>
											<div class="box-body">
												<div class="form-group">
													<input type="text" class="form-control" name="tags">
												</div>
											</div>
										</div>
										<!-- END TAGS -->
									</div>
								</div>
							</form>
						</div>
					@endif
				</div>
			</div>
		</div>
		<!-- Main row -->
	</section>
	<!-- /.content -->
@endsection

@section('footer')
	<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
	<script>
		Editor('content-post');
		$('#lfm').filemanager('image',  {prefix: "/files"});
	</script>
@endsection