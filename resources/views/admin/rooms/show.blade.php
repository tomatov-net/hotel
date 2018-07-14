@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-success" href="{{ route('admin.rooms.create') }}">Create new</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Номер</th>
                        <th>Краткое описание</th>
                        <th>Фото</th>
                        <th>Список клиентов</th>
                    </tr>
                </thead>
                <tbody>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->number }}</td>
                    <td>{{ $room->short_description }}</td>
                    <td><img class="img img-thumbnail" src="{{ Storage::url($room->image) }}" alt=""></td>
                    <td>
                        @foreach($room->clients as $client)
                            {{ $client->name }} <br>
                        @endforeach
                    </td>

                </tbody>
            </table>
        </div>


    </div>

@endsection