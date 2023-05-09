@auth()
@extends ('layout')

@section('title')
    {{$categories->category}}
@endsection

@section('content')



  <div class="container">
      <div class="card-header font-weight-bold">
          <span class="bg-info text-white p-1 rounded"> {{$categories->category}}  </span>
          <div class="card-body">
              <p>
                  <span class="font-weight-bold text-white bg-secondary rounded p-1 mr-3">Id</span>
                  <span class="text-monospace">  {{$categories->id}}</span>
              </p>
          </div>

      </div>


  </div>

@endsection
@endauth
