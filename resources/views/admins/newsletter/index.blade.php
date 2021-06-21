@include('layouts.admins.header')
@include('layouts.partials.navbars')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Company</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
     
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<!-- /.card-header -->
<div class="card-body" style="background-color:white">
    @if(Session::get('success'))
        <div class="alert alert-success" role="alert">
          <h5 class="alert-heading"><i class="fa fa-check" style="margin-right: 7px"></i>Great!</h5>
          {{ Session::get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-3">
            <a href="{{ url('admin/show/add/company') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Company</a>
        </div>
    </div>
    <table id="newsLetterTable" class="table table-bordered table-hover newsLetterTable">
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- /.card-body -->


@include('layouts.admins.footer')
<script>
    $(document).ready(function(){
        $("#newsLetterTable").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "https://newsapi.org/v2/top-headlines?country=us&apiKey=9e56665dd12747d699700625112fe619",       
            dataSrc: 'articles',
            columns: [
                { data: 'title' },
            ]
 
        });
    });

</script>


