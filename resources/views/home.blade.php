@extends('layouts.app')

@section('content')
        <div class="container">
            <!--Modal Ekle Butonu -->
            <div class="row">
                <div class="col-12">
                    <!-- MODAL TRIGGER -->
                    <div class="text-end m-5">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myEkle">Add +</button>
                    </div>

                    <!-- myEkle MODAL Content-->
                    <div class="modal" id="myEkle">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ekle</h5>
                                    <button class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="modal-body">
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
                                              <button type="submit" class="btn btn-success">Kaydet</button>
                                          </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!--############################################################################3-->
            <!--Cardlar -->
            <div class="row mb-5">
                @foreach($posts as $post)
                <div class="col-4 mb-4">
                    <div class="card text-center">
                        <img class="card-img opacity-50"  height="185" src="{{$post->getPostImageAttribute($post->img)}}" alt="">
                        <div class="card-img-overlay">
                            <h4 class="card-title">{{$post->name}}</h4>
                            <p class="card-text mb-5">{{$post->username}}</p>
                            <div class="row">
                                <div class="col-6 text-start">

                                </div>
                                <div class="col-6 text-end">


                                        <form action="{{route('home.destroy',$post->id)}}" method="post"  enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                            <a href="{{route('home.edit',$post->id)}}" class="btn btn-success"> Edit</a>
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                         </form>
                                </div>
                            </div>
                            <p class="card-text text-start" style="margin-top: -18px;">
                                <small class="">Last updated {{$post->updated_at->diffForHumans()}}</small>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            <!--Cardlar Son -->

        </div>
@endsection
