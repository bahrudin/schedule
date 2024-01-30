<div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">@isset($title){{ \Illuminate\Support\Str::ucfirst($title) }}@endisset <small>Example.com</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('blogs.home') }}">Home</a></li>
                <li class="breadcrumb-item">Layout</li>
                <li class="breadcrumb-item active">@isset($title){{'Halaman '.\Illuminate\Support\Str::ucfirst($title) }}@endisset</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
