@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/rooms">Список номеров</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Забронировать</li>
                </ol>
            </nav>
            <form method="POST" action="{{ route('booking.post', ['id' => $room->id]) }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="row">
                            <div class="col-md-10">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" aria-hidden="true" data-dismiss="alert" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span>{{ $error }}</span>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
                @if (session('message'))
                    <div class="row">
                        <div class="col-md-10">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" aria-hidden="true" data-dismiss="alert" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <span>{{ session('message') }}</span>
                            </div>
                        </div>

                    </div>
                @endif
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Название номера</label>
                        <p>{{ $room->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Индекс</label>
                        <p>{{ $room->number }}</p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Краткое описание</label>
                        <p>{{ $room->short_description }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        @isset($room->image)
                            <label for="">Изображение</label>
                            <img src="{{ Storage::url($room->image) }}" alt="" class="img img-thumbnail">
                        @endisset
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="">Ваше Имя</label>
                        <input value="{{ old('name') }}" required class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">ВашТелефон</label>
                        <input value="{{ old('phone') }}" required class="form-control" type="text" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="">Дата заезда</label>
                        <input value="{{ old('period_from') }}" required class="form-control" type="date" name="period_from">
                    </div>
                    <div class="form-group">
                        <label for="">Дата выезда</label>
                        <input value="{{ old('period_to') }}" required class="form-control" type="date" name="period_to">
                    </div>

                </div>
                <div class="col-md-12">
                    <button class="btn btn-info" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection