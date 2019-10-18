@extends('auth.contenido')

@section('login')
<div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Iniciar sesión en su cuenta</p>
                <form class="form-horizontal was-validated" method="POST" action="{{route('login')}}">
                {{ csrf_field() }}

                    <div class="input-group mb-3 {{$errors->has('usuario' ? 'is-invalid':'')}}">
                        
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                            {!!$errors->first('usuario','<span class="invalid-feedback">:message<span>')!!}
                        
                    </div>

                    <div class="input-group mb-4 {{$errors->has('password' ? 'is-invalid':'')}}">
                        
                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                            {!!$errors->first('password','<span class="invalid-feedback">:message<span>')!!}
                        
                    </div>

                    <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">Iniciar sesión</button>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-link px-0" type="button">Se te olvidó tu contraseña?</button>
                    </div>
                    </div>

                </form>
                
            </div>
        </div>
        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                  <div>
                      <h2>Bienvenido</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      <!-- <button class="btn btn-primary active mt-3" type="button">Register Now!</button> -->
                    </div>
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

{{-- <div class="row justify-content-center">
    <div class="col-md-5">
    <div class="card-group mb-0">
        <div class="card p-4">
        <form class="form-horizontal was-validated" method="POST" action="">
        
            <div class="card-body">
            <h3 class="text-center bg-success">Compras - Ventas</h3>
            
            <div class="form-group mb-3">
            <span class="input-group-addon"><i class="icon-user"></i></span>
            <input type="text" value="" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
            
            </div>
            <div class="form-group mb-4">
            <span class="input-group-addon"><i class="icon-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            
            </div>
            <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-success px-4"><i class="fa fa-sign-in fa-2x"></i> Iniciar sesión</button>
            </div>
            </div>
            </div>
        </form>
        </div>

    </div>
    </div>
</div> --}}
@endsection
