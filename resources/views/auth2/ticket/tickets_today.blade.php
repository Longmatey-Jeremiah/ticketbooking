@extends('layouts.admin')
@section('content')
<script type="text/javascript" src="/js/instascan.min.js"></script>
<video id="preview"></video>
<script type="text/javascript">
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  scanner.addListener('scan', function (content) {
    //console.log(content);
    $('.dataTables_filter input').val(content);
    $('.dataTables_filter_input').focus();
  });
  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
</script>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Movie Ticket</th>
                <th>DateTime</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Paid</th>
                <th>Username</th>
                <th>Email</th>
                <th>Token</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
             
                @foreach($booked as $Booked)
                @if(Carbon::parse($Booked->created_at)->format('Y-m-d') == Carbon::parse(today())->format('Y-m-d'))
              <tr>
               
                <?php
                $user = App\User::find($Booked->user_id); 
                $ticket = App\ticket::find($Booked->ticket_id);
                $movie = App\movie::find($ticket->movie_id);
               ?>
            <td class="cart_product_img d-flex align-items-center" id="ticket">
            <a href="#"><img width="100px" height="100px" src="/img/{{$movie->image}}" alt="Product"></a>
                <h6></h6>
            </td>
                <td>{{Carbon::parse($Booked->created_at)->format('l jS \of F Y h:i A') }}</td>
                <td>{{$ticket->price}}</td>
                <td>{{$Booked->qty}}</td>
                <td>{{$Booked->total}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td style="max-width:100px">{{$Booked->token}}</td>
                @if(!$Booked->status)
                <td><button booked="{{$Booked->id}}" id="status" class="btn btn-primary">Unused</button></td>
                @else
                <td><button  class="btn btn-warning">Used</button></td>
                @endif
              </tr>
              @endif
              @endforeach



            </tbody>
          </table>
                </div>
            </div>
        </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->
<script src="/assets/js/lib/data-table/datatables.min.js"></script>
<script src="/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="/assets/js/lib/data-table/jszip.min.js"></script>
<script src="/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="/assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
      $('#bootstrap-data-table-export').DataTable();
      $(document).delegate('#status','click', function(e) {
    e.preventDefault(); 
    $(this).removeClass('btn btn-primary').addClass('btn btn-warning');
    $(this).html("Used");
    var id = $(this).attr('booked');
    $.ajax({
    type: "POST",
    url: '/changeStatus',
    data: {id:id},
    beforeSend: function(){
        swal('Loading...');
    },
    success: function(data) {
        //swal("Good job!", data.response, "success");
        //$(this).html('Unused');
        
      swal('Great',data.response,'success');
     //console.log(data);
    },
    error: function(errors,status,xhr){
        var err = errors.responseJSON.errors;
       $.each(err,function(key,value){
        sweetAlert("Oops...", value+"!!", "error");
       }) ;
      
    }
});
});

    } );
</script>
 


@endsection

