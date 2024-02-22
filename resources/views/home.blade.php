@extends('layouts.main')
@section('title', 'Inicio')
@section('main')
    <section id="banner">
        <div class="row">
            <div
                class="col-lg-9 col-md-12 col-sm-12 d-flex flex-column justify-content-center align-items-center h-100 py-5 ">
                <h2>Yoga para vos</h2>
                <p>Deja que tu práctica de yoga sea una celebración en tu vida.</p>
                <button>Leer más</button>
            </div>
            <div class="col">

            </div>
        </div>
    </section>
    <section id="beneficios mt-5">
        <h3 class="mt-5 text-center mb-5"> Beneficios del Yoga</h3>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center mt-2">
                <div class="card text-center d-flex justify-content-center align-items-center"">
                    <img class="card-img-top w-50 " src="img/pulmones.png" alt="respiracion">
                    <div class="card-body">
                        <h4 class="mb-4">Mejora la respiración</h4>
                        <p class="card-text text-muted">El yoga enseña a respirar correctamente. La respiración conocida
                            como abdominal o diafragmática, que en la inspiración se inicia en el abdomen para continuar en
                            la zona intercostal y terminar en la clavícula, y en la espiración sigue el recorrido a la
                            inversa, incrementa la oxigenación de las células.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center mt-2">
                <div class="card text-center d-flex justify-content-center align-items-center"">
                    <img class="card-img-top w-50 " src="img/equilibrio.png" alt="equilibrio">
                    <div class="card-body">
                        <h4 class="mb-4">Mejora el equilibrio</h4>

                        <p class="card-text text-muted">Para conseguir equilibrio en las posturas, es necesario ejercitar es
                            la conciencia sobre el cuerpo. Solo con una buena alineación se puede mantener un asana que
                            requiera un cierto nivel de equilibrio. Cuando se practica yoga, es importante mantener la
                            concentración en las sensaciones que produce cada postura, estando presentes en todo momento, y
                            realizando las correcciones que sean necesarias para mejorar.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center mt-2">
                <div class="card text-center d-flex justify-content-center align-items-center"">
                    <img class="card-img-top w-50 " src="img/sistema_nervioso.png" alt="sistema-nervioso">
                    <div class="card-body">
                        <h4 class="mb-4">Equilibra el Sistema Nervioso</h4>
                        <p class="card-text text-muted">El yoga estimula la relajación, hace más lenta la respiración y
                            ayuda a equilibrar el sistema nervioso autónomo, compuesto por el sistema nervioso simpático
                            (SNS) y el sistema nervioso parasimpático (SNP). El yoga activa el SNP, que favorece la
                            relajación, reduciendo el ritmo cardiaco y la presión sanguínea, y facilita la recuperación en
                            situaciones de estrés.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center mt-2">
                <div class="card text-center d-flex justify-content-center align-items-center"">
                    <img class="card-img-top w-50 " src="img/flexibilidad.png" alt="flexibilidad">
                    <div class="card-body">
                        <h4 class="mb-4">Aumenta la flexibilidad</h4>
                        <p class="card-text text-muted">Uno de los primeros cambios positivos que se perciben al empezar a
                            practicar yoga es el aumento de la flexibilidad, muy importante porque, entre otras cosas, ayuda
                            a evitar lesiones. Es probable que en un principio el cuerpo esté rígido, lo que se percibe con
                            más claridad en las torsiones, pero, con la constancia, estas posturas son las mejores aliadas
                            para aumentar la flexibilidad.</p>
                    </div>
                </div>
            </div>

    </section>
    <section id="principiantes">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h2>Yoga para principiantes</h2>
                <p class="text-muted">Conocé los ejercicios básicos para principiantes.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HZn7SwU-lN8"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <section id="news">
        <div class="col-12 text-center mt-5">
            <h2><span>Nuestros </span>Productos</h2>
            <p class="text-muted">Tenemos los mejores productos para tus clases de yoga.</p>
        </div>

    </section>
    <section id="contacto">
        <form action="">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <h2>¡Contactános!</h2>
                    <p class="text-muted">¡Vení a participar de nuestras clases!</p>
                </div>
            </div>
            <div class="row ">
                <div class="col-6 d-flex justify-content-center align-items-center flex-column ">
                    <label for="name" class="form-label  ">Nombre</label>
                    <input type="name" id="name" name="name" placeholder="Nombre">
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center flex-column">
                    <label for="apellido" class="form-label ">Apellido</label>
                    <input type="apellido" id="apellido" name="apellido" placeholder="Apellido">
                </div>
            </div>
            <div class="row ">
                <div class="col-6 d-flex justify-content-center align-items-center flex-column">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center flex-column">
                    <label for="telefono" class="">Telefono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center flex-column ">
                    <p class="mx-3">¿Cómo nos conoció?</p>
                    <select name="select">
                        <option value="value2" selected>Elija una opción</option>
                        <option value="value1">Facebook</option>
                        <option value="value2">Instagram</option>
                        <option value="value3">Otro medio</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center my-4">
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </form>


    </section>
@endsection
