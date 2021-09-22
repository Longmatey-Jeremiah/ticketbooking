@extends('layouts.admin')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    {{-- <li class="active">Dashboard</li> --}}
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    

<a href="/alltickets">
   <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                   
                </div>
                <p class="text-light">All Tickets</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    
                </div>

            </div>

        </div>
    </div>
</a>
    <!--/.col-->
    <a href="/ticket_all">
        <div class="col-sm-6 col-lg-3">
             <div class="card text-white bg-flat-color-1">
                 <div class="card-body pb-0">
                     <div class="dropdown float-right">
                         <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                             <i class="fa fa-cog"></i>
                         </button>
                        
                     </div>
                     <p class="text-light">Scan</p>
     
                     <div class="chart-wrapper px-0" style="height:70px;" height="70">
                         
                     </div>
     
                 </div>
     
             </div>
         </div>
     </a>
     <a href="/ticket_today">
        <div class="col-sm-6 col-lg-3">
             <div class="card text-white bg-flat-color-1">
                 <div class="card-body pb-0">
                     <div class="dropdown float-right">
                         <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                             <i class="fa fa-cog"></i>
                         </button>
                        
                     </div>
                     <p class="text-light">Booked Tickets Today</p>
     
                     <div class="chart-wrapper px-0" style="height:70px;" height="70">
                         
                     </div>
     
                 </div>
     
             </div>
         </div>
     </a>
    <!--/.col-->
    <!--/.col-->
    <style>
        .card{
          outline:none;
          border:none;
          border-radius:10px;
          box-shadow:2px 2px 1px rgba(201, 201, 201, 0.719);
        }
        .card:hover{
            transform: scale(1.02);
            transition: 200ms;
            cursor: pointer;
        }
        button{
            border-radius: 5px !important;
        }
    </style>

   
   

 

</div> <!-- .content -->
</div><!-- /#right-panel -->


<!-- Right Panel -->
@endsection