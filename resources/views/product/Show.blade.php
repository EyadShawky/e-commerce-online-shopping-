@auth()
@extends ('layout')

@section('title')
    {{$proudcts->product_name}}
@endsection

@section('content')
    <div class="display-right-container">



  <div class="container">
      <div class="card-header font-weight-bold">
          <span class="bg-info text-white p-1 rounded"> {{$proudcts->product_name}}  </span>
          <div class="card-body">
              <p>
                  <span class="font-weight-bold text-white bg-secondary rounded p-1 mr-3">Id</span>
                  <span class="text-monospace">  {{$proudcts->id}}</span>
              </p>
          </div>

      </div>


  </div>
    </div>
@endsection
@endauth
