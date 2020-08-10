@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Post::all()->count() }}</h3>

                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-newspaper"></i>
                        </div>
                        <a href="{{ route('posts.index') }}" class="small-box-footer">View posts <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ \App\Category::all()->count() }}</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-network-wired"></i>
                        </div>
                        <a href="{{ route('categories.index') }}" class="small-box-footer">View Categories <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ \App\Tag::all()->count() }}</h3>

                            <p>Tags</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-link"></i>
                        </div>
                        <a href="{{ route('tags.index') }}" class="small-box-footer">View Tags <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ \App\Post::onlyTrashed()->count() }}</h3>

                            <p> Trash</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-trash"></i>
                        </div>
                        <a href="{{ route('trashed.index') }}" class="small-box-footer">Open Trash <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection
