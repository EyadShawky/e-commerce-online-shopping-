@auth()
@extends ('layout')

@section('title')
    {{$users->name}}
@endsection

@section('content')
    <div class="display-right-container">



  <div class="container">
      <div class="card-header font-weight-bold">
          <span class="bg-info text-white p-1 rounded">ID : {{$users->id}}  </span>
          <div class="card-body">
              <p>
                  <span class="font-weight-bold text-white bg-secondary rounded p-1 mr-3">Name</span>
                  <span class="text-monospace">
                      {{$users->name}}
                  </span>
              </p>

              <p>
                  <span class="font-weight-bold text-white bg-secondary rounded p-1 mr-3">Email</span>
                  <span class="text-monospace">
                      {{$users->email}}
                  </span>
              </p>

              <p>
                  <span class="font-weight-bold text-white bg-secondary rounded p-1 mr-3">Address</span>
                  <span class="text-monospace">
                      {{$users->address}}
                  </span>
              </p>

              <p>
                  <span class="font-weight-bold text-white bg-secondary rounded p-1 mr-3">Created At</span>
                  <span class="text-monospace">
                      {{$users->created_at}}
                  </span>
              </p>


          </div>

      </div>


  </div>
    </div>
@endsection
@endauth
