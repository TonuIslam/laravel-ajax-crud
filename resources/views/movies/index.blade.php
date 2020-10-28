@extends('movies/layout')
@section('content')
<section class="container">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col"></th>
	      <th scope="col">Title</th>
	      <th scope="col">Last</th>
	      <th scope="col">Handle</th>
	    </tr>
	  </thead>
	  @if($movies)
	  <tbody>
	  	@foreach($movies as $movie)
	    <tr>
	      <td class="align-middle"><img src="{{asset('uploads/'.$movie->poster)}}" class="img-thumbnail"></td>
	      <td class="align-middle">{{$movie->title}}</td>
	      <td class="align-middle">{{$movie->genre}}</td>
	      <td class="align-middle">{{$movie->release_year}}</td>
	    </tr>
	    @endforeach
	  </tbody>
	  @endif
   </table>
</section>
@endsection