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
    <table id="companiesTable" class="table table-bordered table-hover companiesTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Action</th>

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
        $("#companiesTable").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('ajax.datatables') }}",
            // "columns": [
            //         { "title": "name", "data": "name" },
            //         { "title": "email", "data": "email" },
            //         { "title": "website", "data": "website" }
            // ],
            columnDefs: [
                
                {
                    "targets": [0],
                    "data" : "name",
                    "defaultContent": "-",
                },
                {
                    "targets": [1],
                    "data" : "email",
                    "defaultContent": "-",
                },
                {
                    "targets": [2],
                    "data" : "website",
                    "defaultContent": "-",
                },
                {
                    targets: 3,
                    render: function (data, type, row, meta) {
                    data = `<a href='{{ url('admin/show/edit/company/${row.id}') }}' class="btn btn-primary">Edit</a> &nbsp;`;
                    data += `<a href='{{ url('admin/delete/company/${row.id}') }}' class="btn btn-danger">Delete</a>`;
                       return data;
                    }
                }
            ]
        });
    });

</script>


