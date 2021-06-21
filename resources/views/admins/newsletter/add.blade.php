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
<div class="container">
    <!-- /.card-header -->
    <div class="card-body" style="background-color:white">
        
            <!-- form start -->
        <form action="{{ url('admin/add/company') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Company Name</label>
                <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Enter Company Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="emailAdd" id="emailAdd" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Upload Logo</label>
                <div class="input-group">
                    <div class="custom-file">
                    <!-- <input type="file" id="uploadImage" name="image" hidden> -->
                    <input type="file" class="custom-file-input" name="uploadLogo" id="uploadLogo">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        
    </div>
    <!-- /.card-body -->
</div>

@include('layouts.admins.footer')

