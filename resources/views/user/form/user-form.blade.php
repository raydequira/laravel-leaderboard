@include('components/form-error')
<form action="{{ $route }}" method="POST">
    @csrf
    <p class="font-weight-bold">Personal Info</p>
    <div class="form-group">
        <label>First Name</label>
        <input 
            type="text" 
            name="first_name" 
            class="form-control" 
            placeholder="Enter first name"
            value="{{old('first_name', $user->first_name ?? '')}}"
        >        
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input 
            type="text" 
            name="last_name" 
            class="form-control" 
            placeholder="Enter last name"
            value="{{old('last_name', $user->last_name ?? '')}}"
        >        
    </div>
    <p class="font-weight-bold">Contact Details</p>
    <div class="form-group">
        <label>Email address</label>
        <input 
            type="email" 
            name="email" 
            class="form-control" 
            placeholder="Enter email"
            value="{{old('email', $user->email ?? '')}}"
        >        
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input 
            type="text" 
            name="phone" 
            class="form-control" 
            placeholder="Enter Phone"
            value="{{old('phone', $user->phone ?? '')}}"
        >
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>