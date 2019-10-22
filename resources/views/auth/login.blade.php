@extends('auth.contenido')

@section('css')


<style>
    :root {
      --shadowColor: hsla(0, 0%, 0%, 0.08);
    }

    body {
      /* font-family: system-ui;
      background: #f0f3f7;
      color: rgba(0, 0, 0, .6);
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh; */
    }

    form {
      /* border: 1px solid red; */
      /* box-shadow: 0 0 5px rgba(0, 0, 0, .2);
      border-radius: 5px;
      width: 400px;
      margin: 0 auto;
      padding: 2em 1.5em;
      background: white; */
    }

    label {
      /* text-align: center;
      display: block;
      padding-bottom: 1em;
      margin-bottom: 1em;
      font-size: 1.2em;
      font-weight: bold;
      box-shadow: 0 3px 2px -2px var(--shadowColor); */
    }

    input {
      /* width: 100%;
      border-radius: 5px;
      box-shadow: inset 0 2px 4px 0 var(--shadowColor);
      font-size: 14px;
      padding: .8em 1em;
      box-sizing: border-box;
      border: 1px solid var(--shadowColor);
      margin-bottom: 1em;
      outline: 0; */
    }

    input:focus {
      box-shadow: 0 0 10px 0 rgba(255, 255, 255, .5);
    }

    button {
      /* color: white;
      background: #38b765;
      border: none;
      width: 100%;
      padding: .8em 1em;
      border-radius: 5px;
      font-size: 1em; */
    }

    .overlay {
      background: rgba(0, 0, 0, .7);
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 2;
      display: none;
    }

    .overlay.is-active {
      display: block;
    }

    input.is-active {
      position: relative;
      z-index: 3;
    }

    button {
      position: relative;
      z-index: 3;
    }
  </style>
@endsection

@section('login')
<div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Iniciar sesión en su cuenta</p>
                <form class="form-horizontal was-validated" method="POST" action="javascript: Login(this)" id="log" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="input-group mb-3 {{$errors->has('usuario' ? 'is-invalid':'')}}">
                        
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario" autocomplete="off" required>
                            <!-- {!!$errors->first('usuario','<span class="invalid-feedback">:message<span>')!!} -->
                        
                    </div>

                    <div class="input-group mb-4 {{$errors->has('password' ? 'is-invalid':'')}}">
                        
                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" autocomplete="off" required>
                            <!-- {!!$errors->first('password','<span class="invalid-feedback">:message<span>')!!} -->
                        
                    </div>

                    <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">Iniciar sesión</button>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-link px-0" type="button">Se te olvidó tu contraseña?</button>
                    </div>
                    </div>

                    <div style="clear:both"></div>


                </form>

                    @if(!$errors->isEmpty())
                    <div calss="alert alert-danger" role="alert">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="overlay" id="overlay"></div>
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

@endsection

@section('js')

<script src="{{ asset('js/login.js') }}"></script>

<script type="text/javascript">
  $(document).ready( function () {
    const $inputList = document.querySelectorAll('input')
    const $overlay = document.querySelector('#overlay')

    $inputList.forEach($input => {
      $input.addEventListener('focus', focus)
      $input.addEventListener('blur', blur)
    })

    $overlay.addEventListener('click', (event) => {
    //   console.log(event);
      $overlay.classList.remove('is-active')
      const $maybeIsAnInput = document.elementFromPoint(event.clientX, event.clientY)
      if ($maybeIsAnInput.tagName === 'INPUT') {
        $maybeIsAnInput.focus()
      }
    })

    function focus(event) {
    //   console.log('focus')
      event.target.classList.add('is-active')
      $overlay.classList.add('is-active')
    }

    function blur(event) {
    //   console.log('blur')
      event.target.classList.remove('is-active')
      // $overlay.classList.remove('is-active')
    }
  });
</script>
@endsection
