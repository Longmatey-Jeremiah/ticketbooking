@extends('layouts.admin')
@section('content')
<div class="col-md-4">
        <aside class="profile-nav alt">
            <section class="card">
                <div class="card-header user-header alt bg-dark">
                    <div class="media">
                      
                        <div class="media-body">
                        <h2 class="text-light display-6">Category - <small>{{$Category->name}}</small></h2>
                           
                        </div>
                    </div>
                </div>
                <?php
                                                    $dt     = new Carbon($Category['created_at']);
                                                   
                                                 // 10 days ago
                                                    $created = $dt->diffForHumans(); 
                                                    $dt =    new Carbon($Category['updated_at']);
                                                    $updated = $dt->diffForHumans();
                                                    ?>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    <a href="#"> <i class="fa fa-envelope-o"></i>Movies <span class="badge badge-primary pull-right">{{count($Category->movie)}}</span></a>
                    </li>
                    <li class="list-group-item">
                    <a href="#"> <i class="fa fa-tasks"></i> Added on <span class="badge badge-danger pull-right">{{$created}}</span></a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"> <i class="fa fa-comments-o"></i>Last Updated <span class="badge badge-warning pull-right r-activity">{{$updated}}</span></a>
                    </li>
                    <li class="list-group-item">
                            <input data-toggle="modal" data-target="#addcategory" class="btn btn-primary" type="reset" value="Edit">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['category.destroy', $Category->id]
                            ]) !!}
                            <input style="float:right" class="btn btn-danger" type="submit" value="Delete">
                            {!! Form::close() !!}
                        </li>
                </ul>
                

            </section>
        </aside>
    </div>
    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['action'=>['categoryController@update',$Category->id],'method'=>'PUT','class'=>"form-horizontal",'files'=>true]) !!}
                    <div class="modal-body">
                       
                <div class="control-group">
                        {{Form::label('Name','name',['class'=>'control-label'])}}
                        <div class="controls">
                        {{Form::text('name',$Category->name,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="control-group">
                            {{Form::label('description','description',['class'=>'control-label'])}}
                            <div class="controls">
                            {{Form::text('description',$Category->description,['class'=>'form-control'])}}
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
    
    @if(count($Category->movie))
    @foreach($Category->movie as $movies)
    <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="p-0 clearfix">
                    <i class="fa fa-cogs bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-primary mb-0 pt-3"></div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">{{$movies->name}}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">{{Carbon::parse($movies->created_at)->format('l jS \of F Y h:i A') }}</div>
                </div>
            </div>
        </div>
   
       @endforeach
       @else
      
       <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="p-0 clearfix">
                    <i class="fa fa-cogs bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-primary mb-0 pt-3"></div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Sorry there is no movie here</div>
                </div>
            </div>
        </div>
        @endif

                    
@endsection