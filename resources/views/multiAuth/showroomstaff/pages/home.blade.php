@extends('layout.consumer')

@section('title', 'Show Room')

@section('content')
  @include('multiAuth.showroomstaff.inc.navbar')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Show Room Dashboard</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      You are logged in!
                  </div>
              </div>
          </div>
      </div>
  </div>
@stop

@section('style')

@stop

@section('script')

@stop
