@extends('layouts.app')

@section('title-block')
	Страница записей
@endsection


@section('content')
	<div class="container">
        <h1>Добавить новую запись</h1>



        <form action="{{route('contacts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Введите имя</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="subject">Введите тему сообщения</label>
                <input type="text" name="subject" id="subject" class="form-control">
            </div>
            <div class="form-group">
                <label for="message">Сообщение</label>
                <textarea name="message" id="message" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Выберете изображение</label>
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>


@endsection
