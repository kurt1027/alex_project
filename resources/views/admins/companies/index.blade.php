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
    <table id="companiesTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- /.card-body -->

@include('layouts.admins.footer')

