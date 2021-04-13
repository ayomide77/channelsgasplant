<div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
          
          @if (Auth::user()->image != null)
          <img src="/chnlsgasplant/images/user/{{Auth::user()->image}}" alt="{{Auth::user()->name}}" class="rounded-circle" width="150">
          @else
          <img src="{{asset('chnlsgasplant/images/user/avatar.png')}}" alt="{{Auth::user()->name}}" class="rounded-circle" width="150"> 
          @endif

          <div class="mt-3">
            <h4>Customer</h4>
            {{-- <p class="text-secondary mb-1">Customer</p> --}}
            <a href="#" class="btn btn-danger"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>


            <a href="{{route('setting')}}" class="btn btn-info"  ><i class="fa fa-cog"></i> Settings</a>
            {{-- LOGOUT FORM --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
             </form>
            {{-- LOGOUT FORM --}}
        
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
          <h5 class="mb-0"> <i class="fa fa-user "></i> Profile</h5>
          <a href="{{route('profilePage')}}" class="btn btn-primary btn-sm">Update Profile</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
          <h5 class="mb-0"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Orders</h5>
          <a href="{{route('customerOrders')}}" class="btn btn-info btn-sm">View Orders</a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
          <h5 class="mb-0"><i class="fa fa-comments" aria-hidden="true"></i> Complaints </h5>
          <a href="{{route('createTicket')}}" class="btn btn-warning btn-sm"> Create Ticket</a>
        </li>
      </ul>
    </div>
  </div>