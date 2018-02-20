@extends('layouts/account')

@section('title')
Account - dashboard
@endsection

@section('content')
<div>
  <h1>Create Project</h1>
  <h6>This is where all your projects are located</h6>
  <div class="row">
    <div class="col-md-12">
      <div class="box">


      <div class="row">
            <div class="col-md-10">
              <form action="/account/projects" method="POST">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <label for="title">
                      Title
                    </label>
                  </div>
                </div>
              <div class="row">
                <div class="col-md-6">
            <input type="text" name="title">
            <button type="submit" name="active" value="1">Save</button>
          </form>
        </div>
      </div>

    </div>

  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>

@endsection
