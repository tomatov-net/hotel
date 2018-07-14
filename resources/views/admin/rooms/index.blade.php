@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-success" href="{{ route('admin.rooms.create') }}">Создать новую комнату</a>
            <a class="btn btn-info" href="{{ route('admin.rooms.booking.index') }}">Список броней</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Краткое описание</th>
                        <th>Фото</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td><a href="{{ route('admin.rooms.edit', ['id' => $room->id]) }}">{{ $room->name }}</a></td>
                        <td>{{ $room->short_description }}</td>
                        <td><img class="img img-thumbnail" src="{{ Storage::url($room->image) }}" alt=""></td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.rooms.edit', ['id' => $room->id]) }}">Редактировать</a>
                            <a class="btn btn-dark" href="{{ route('admin.rooms.show', ['id' => $room->id]) }}">Просмотр</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>


    </div>

@endsection