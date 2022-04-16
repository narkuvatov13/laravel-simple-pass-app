@extends('layouts.app')
@section('content')
    <!-- myEdit MODAL Content-->
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>

            <div class="col-6">
                <h5 class="text-center">Edit</h5>
                <form action="{{route('home.update',$site->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">URL:</label>
                            <input class="form-control" name="url" value="{{$site->url}}" type="text" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="name">Site Name:</label>
                            <input class="form-control" name="name" value="{{$site->name}}" type="text" id="name" placeholder="Site Name">
                        </div>
                        <div class="form-group">
                            <label for="name">Username:</label>
                            <input class="form-control" name="username" value="{{$site->username}}" type="text" id="name" placeholder="Username">
                        </div>

                        <div class="input-group mb-1">
                            <input type="password" name="password" value="{{$site->password}}" id="password" class="form-control" data-toggle="password" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <!-- FILE INPUT -->
                        <div class="form-group">
                            <label for="file">File input</label>
                            <div><img src="{{$site->getPostImageAttribute($site->img)}}" height="100px" alt=""></div>
                            <input type="file" name="img" value="{{$site->img}}" id="file" class="form-control-file">
                            <small class="form-text text-muted" id="fileHelp">Max 3mb size</small>
                        </div>
                        <!-- TEXTAREA -->
                        <div class="form-group">
                            <label for="message">Note:</label>
                            <textarea class="form-control" name="note" id="message" rows="3" placeholder="Note">{{$site->note}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" href="{{route('home')}}" >Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
