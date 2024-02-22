<?php
/** @var \Illuminate\Support\ViewErrorBag $erorrs */
/** @var \App\Models\User[]\Illuminate\Database\Eloquent\Collection $user  */
?>

<div class="container-fluid">
    <div class="form mx-auto my-4 col-lg-12 col-md-12 col-sm-12">
        <form action="{{ $url }}" method="post">
            @csrf
            <h2 class="text-center">{{ $title }}</h2>
            <div class="mb-3 mt-5">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico"
                    @error('email') aria-describedby="error-email" @enderror value="{{ old('email') }}">

                @error('email')
                    <div class="text-danger" id="error-email">{{ $message }} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña."
                    @error('password') aria-describedby="error-password" @enderror{{--  value="{{ old('password') }}" --}}>
                @error('password')
                    <div class="text-danger" id="error-password">{{ $message }} </div>
                @enderror
            </div>

            <div class="mt-5">
                <button type="submit" class="button-ingresar">{{ $buttonText }}</button>
            </div>
            <div class="mt-3">
                <a href="{{ $linkUrl }}" type="button" class=" btn registro-existente">{{ $linkText }}</a>
            </div>

        </form>
    </div>

</div>
