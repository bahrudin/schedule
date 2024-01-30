@extends('frontend.layouts.blog')

@push('css')
@endpush

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card my-2">
                    <div class="card-body">
                        <h2>{{ $article->title }}</h2>
                        <div>{{ $article->category->name }} | {{ \Carbon\Carbon::parse($article->published_at)->diffForHumans() }}</div>
                        <li class="dropdown-divider"></li>
                        <p class="card-text">{{ $article->contents }}</p>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-3">

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection


@push('scripts')
@endpush
