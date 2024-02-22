@extends('layouts.main')
@section('title', 'Editar Mi perfil')

@section('main')
    <div class="row my-5 text-center">
        <h2>Editar Perfil</h2>
    </div>
    <div class="container">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <label for="email" class="fs-3">Email:</label>
                    <input type="text" name="email" value="{{ old('email', $user->email) }}">
                </div>
            </div>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
    
            <div class="row">
                <div class="col-12 text-center">
                    <p class="fs-3">Cambiar Contraseña</p>
                </div>
            </div>
           
            <div class="row">
                <div class="col-12">
                    <label for="current_password">Contraseña Actual:</label>
                    <div class="input-group mb-3">
                        <input type="password" name="current_password" class="form-control " id="current_password">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary w-100" type="button" id="current-password-toggle">Mostrar</button>
                        </div>
                    </div>
                    @error('current_password')
                        <div class="text-danger" id="error-message">{{ $message }} </div>
                    @enderror
            
                    <label for="new_password">Nueva Contraseña:</label>
                    <div class="input-group mb-3">
                        <input type="password" name="new_password" class="form-control" id="new_password">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary w-100" type="button" id="new-password-toggle">Mostrar</button>
                        </div>
                    </div>
            
                    <label for="new_password_confirmation">Confirmar Nueva Contraseña:</label>
                    <div class="input-group mb-3">
                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary w-100" type="button" id="new-password-confirm-toggle">Mostrar</button>
                        </div>
                    </div>
                    @error('new_password')
                        <div class="text-danger" id="error-message">{{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <button type="submit" class="w-50">Guardar Cambios</button>
                </div>
            </div>
    
           
        </form>
    </div>
    <script>
        document.getElementById('current-password-toggle').addEventListener('click', function() {
            togglePasswordVisibility('current_password');
        });

        document.getElementById('new-password-toggle').addEventListener('click', function() {
            togglePasswordVisibility('new_password');
        });

        document.getElementById('new-password-confirm-toggle').addEventListener('click', function() {
            togglePasswordVisibility('new_password_confirmation');
        });

        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
    </script>
@endsection
