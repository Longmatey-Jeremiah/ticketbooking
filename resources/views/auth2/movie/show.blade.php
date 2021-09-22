@extends('layouts.admin')
@section('content')
<div class="col-md-4">
        <aside class="profile-nav alt">
            <section class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                      
                        <div class="media-body">
                        <h2 class="text-light display-6">Category - <small>{{$Movie->name}}</small></h2>
                           
                        </div>
                    </div>
                </div>
                <?php
                    $dt     = new Carbon($Movie['created_at']);
                    
                    // 10 days ago
                    $created = $dt->diffForHumans(); 
                    $dt =    new Carbon($Movie['updated_at']);
                    $updated = $dt->diffForHumans();
                    ?>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    <a href="#"> <i class="fa fa-tasks"></i> Added on <span class="badge badge-danger pull-right">{{$created}}</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-comments-o"></i>Last Updated <span class="badge badge-warning pull-right r-activity">{{$updated}}</span></a>
                    </li>
                    <li class="list-group-item">
                            <input data-toggle="modal" data-target="#addmovie" class="btn btn-primary" type="reset" value="Edit">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['movie.destroy', $Movie->id]
                            ]) !!}
                            <input style="float:right" class="btn btn-danger" type="submit" value="Delete">
                            {!! Form::close() !!}
                        </li>
                </ul>
                

            </section>
        </aside>
    </div>
    <div class="modal fade" id="addmovie" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['action'=>'movieController@store','method'=>'POST','class'=>"form-horizontal",'files'=>true]) !!}
                <div class="modal-body">
                   
            <div class="control-group">
                    {{Form::label('Name','name',['class'=>'control-label'])}}
                    <div class="controls">
                    {{Form::text('name','name',['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="control-group">
                        {{Form::label('description','description',['class'=>'control-label'])}}
                        <div class="controls">
                        {{Form::text('description','description',['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                    
                    
                    <div class="col-lg-4">
                            <div class="control-group">
                                    {{Form::label('Movie - Image','file',['class'=>'control-label'])}}
                                    <div class="controls">
                                    {{ Form::file('image')}}
                                    </div>
                                </div>
                            </div>
                   
                            <div class="col-lg-4">
                                    <div class="control-group">
                                            {{Form::label('Category','Category',['class'=>'control-label'])}}
                                            <div class="controls">
                                            {{Form::select('category_id',$category,['class'=>'form-control'])}}
                                            </div>
                                        </div>
                                </div>    
                    </div>
                    <!--
                     
                    -->
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
               
                        {!!Form::close()!!}
                
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['action'=>['categoryController@update',$Movie->id],'method'=>'PUT','class'=>"form-horizontal",'files'=>true]) !!}
                    <div class="modal-body">
                       
                <div class="control-group">
                        {{Form::label('Name','name',['class'=>'control-label'])}}
                        <div class="controls">
                        {{Form::text('name',$Movie->name,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="control-group">
                            {{Form::label('description','description',['class'=>'control-label'])}}
                            <div class="controls">
                            {{Form::text('description',$Movie->description,['class'=>'form-control'])}}
                            </div>
                        </div>
                             
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                   
                            {!!Form::close()!!}
                    
                </div>
            </div>
        </div>
   --}}
@endsection