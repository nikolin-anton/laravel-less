@extends('layouts.app')

@section('title-block') {{$data->subject}} @endsection


@section('content') <h1>{{$data->subject}}</h1>

	<div class="alert alert-info">
		<p>{{$data->name}}</p>
		<p>{{$data->email}}</p>
		<p>{{$data->message}}</p>
		<p><small>{{$data->created_at}}</small></p>
		<a href="{{route('contacts.edit', $data->id)}}"><button class="btn btn-primary">Редактировать</button></a>
		<a href="{{route('contacts.destroy', $data->id)}}"><button class="btn btn-danger" id="delete_contact" data-id="{{$data->id}}">Удалить</button></a>
	</div>



@endsection
