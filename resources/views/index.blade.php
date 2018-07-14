@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rooms list</div>

                <div class="card-body">
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
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->short_description }}</td>
                                <td><img class="img img-thumbnail" src="{{ Storage::url($room->image) }}" alt=""></td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('booking.get', ['id' => $room->id]) }}">Забронировать</a>
                                    {{--<form method="post" action="{{ route('booking', ['id' => $room->id]) }}">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="">Дата заезда</label>--}}
                                            {{--<input class="form-control" type="date" value="period_from">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="">Дата выезда</label>--}}
                                            {{--<input class="form-control" type="date" value="period_to">--}}
                                        {{--</div>--}}
                                        {{--<button class="btn btn-success" type="submit" href="{{ route('admin.rooms.edit', ['id' => $room->id]) }}">Забронировать</button>--}}
                                    {{--</form>--}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
