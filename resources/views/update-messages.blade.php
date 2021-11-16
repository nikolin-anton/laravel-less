@extends('layouts.app')

@section('title-block')
	Страница записи
@endsection


@section('content')
	<h1>Обновление записи</h1>



	<form action="{{route('contacts.update', $data->id)}}" method="post">
        @csrf
        {{--		@csrf_field--}}
{{--        {{ method_field('PUT') }}--}}

		<div class="form-group">
			<label for="name">Введите имя</label>
			<input type="text" value="{{$data->name}}" name="name" id="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" value="{{$data->email}}" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="subject">Введите тему сообщения</label>
			<input type="text" value="{{$data->subject}}" name="subject" id="subject" class="form-control">
		</div>
		<div class="form-group">
			<label for="message">Сообщение</label>
			<textarea name="message" id="message" class="form-control">{{$data->message}}</textarea>
		</div>
		<button type="submit" class="btn btn-success">Обновить</button>
	</form>


@endsection
