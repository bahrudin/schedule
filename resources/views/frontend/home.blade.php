@extends('frontend.layouts.blog')

@push('css')
@endpush

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            @foreach($articles as $article)
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title"><a
                                href="{{ route('articles.show',['slug'=>$article->slug]) }}">{{ $article->title }}</a>
                        </h5>
                        <p class="card-text">{{ $article->content }}</p>
                    </div>
                </div>
            @endforeach
            {!! $articles->withQueryString()->links('pagination::bootstrap-5') !!}
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
