@extends('Dashbord/layout/master')
@section('style')
<link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')

 <section class="content-header">
    <h1>
      User on Store 
     
    </h1>
  </section>
 <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>name</th>
                  <th>email</th>
                  <th>role</th>
                  <th>phone</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($users as $user)
                <tr>
                    <th>{{ $user->name}}</th>
                    <th>{{ $user->email}}</th>
                    <th>{{ $user->rule}}</th>
                    <th>{{ $user->phoned}}</th>
                </tr>
                @empty
                    <h1>dont have user yet </h1>
                @endforelse
              </tbody>
          
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
<!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section>

@endsection
@section('script')


<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
      $("#example1").dataTable();
      $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
      });
    });
  </script>
@endsection