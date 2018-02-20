@extends('layouts/main')

@section('title')
DesignStorm - Design Ideas for Devs
@endsection



    @section('content')
    <div id="site-section">
      <div class="container">
        <div id="results">
          <div>
            <div class="search-container">
              <form action="/results" method="POST">
                {{ csrf_field() }}
              <input class="search" type="text" value="{{$keyword}}" placeholder="Search" name="search">
              </form>
            </div>
            <div class="boxes">
              <div class="row">
              @if(count($filteredData) >= 1)
                @foreach ($filteredData as $image)
                <div class="col-md-3">
                  <div class="box">
                    <div style="position: relative; background: url('{{$image->covers->{'original'} }}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                    @php
                    $codeUrl = urlencode($image->covers->{'original'})
                    @endphp
                    <a href="/projects/inspiration/{{$image->id}}/add?image_url={{$codeUrl}}"> <div class="add-btn @if(in_array($image->id, $imgArrayInfo)) active @endif"> <i class="fa fa-check" aria-hidden="true">
                      </i></div></a>
                    </div>

                  </div>
                </div>
                @endforeach
              @else
                <h1>Sorry No Results</h1>
              @endif

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
