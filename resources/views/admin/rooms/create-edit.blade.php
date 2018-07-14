@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/rooms">Rooms list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Room</li>
                </ol>
            </nav>
            <form method="POST" action="{{ isset($room) ? route('admin.rooms.update', ['id' => $room->id]) : route('admin.rooms.store') }}" enctype="multipart/form-data">
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
                        <label for="">Название</label>
                        <input required value="{{ $room->name ?? old('name') ??'' }}" class="form-control" type="text"  name="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Номер</label>
                        <input required value="{{ $room->number ?? old('number') ?? '' }}" class="form-control" type="text"  name="number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Краткое описание</label>
                        <textarea class="form-control" name="short_description" rows="10" cols="100">{{ $room->short_description ?? old('short_description') ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Изображение</label>
                        <input value="{{ old('image') }}" class="form-control" type="file" name="image">
                        @isset($room->image)
                            <img src="{{ Storage::url($room->image) }}" alt="" class="img img-thumbnail">
                        @endisset
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-info" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection