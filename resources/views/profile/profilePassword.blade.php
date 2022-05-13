@extends('/general/headerFooter')
@section('content')
<div class="container text-dark">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-header">{{ trans('profile.update_password') }}</div>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('profile.current_password') }}</label>
  
                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('profile.new_password') }}</label>
  
                            <div class="col-md-6">
                                <input id="update_password" type="password" class="form-control" name="update_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('profile.confirm_new_password') }}</label>
    
                            <div class="col-md-6">
                                <input id="update_confirm_password" type="password" class="form-control" name="update_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn button-purple">
                                    {{ trans('profile.update_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection