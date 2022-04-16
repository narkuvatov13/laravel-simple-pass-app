@extends('layouts.app')
@section('content')
    <div class="container">
             <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">URL:</label>
                <input class="form-control" name="url" type="text" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="name">Site Name:</label>
                <input class="form-control" name="name" type="text" id="name" placeholder="Site Name">
            </div>
            <div class="form-group">
                <label for="name">Username:</label>
                <input class="form-control" name="username" type="text" id="name" placeholder="Username">
            </div>

            <div class="input-group mb-1">
                <input type="password" name="password" id="password" class="form-control" data-toggle="password" placeholder="Password">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
            <!-- FILE INPUT -->
            <div class="form-group">
                <label for="file">File input</label>
                <input type="file" name="img" id="file" class="form-control-file">
                <small class="form-text text-muted" id="fileHelp">Max 3mb size</small>
            </div>
            <!-- TEXTAREA -->
            <div class="form-group">
                <label for="message">Note:</label>
                <textarea class="form-control" name="note" id="message" rows="3" placeholder="Note"></textarea>
            </div>







        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Iptal</button>
            <button type="submit" class="btn btn-success" data-dismiss="modal">Kaydet</button>
        </div>
    </form>
    </div>
@endsection
