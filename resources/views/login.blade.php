<x-layout>
    <div class="mx-auto" style="max-width: 500px;">
        <div class="card shadow-lg m-3">
            <form action="{{ url('login') }}" method="POST">
                @method('POST')
                @csrf
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="h4 text-center">Login</p>
                    <div class="form-group row">
                        <label class="col-sm-3">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="remember">Remember me</label>
                        <input type="checkbox" name="remember" value="1">
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</x-layout>