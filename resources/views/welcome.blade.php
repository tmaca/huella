@extends("layouts.main")

@section("title", "Huella")

@section("content")

    <div class="container-fluid" id="quienesSomos">
        <div class="container">
            <div class="bloque">
                <h1>Quienes somos</h1>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in velit eget metus lobortis semper id vel ante. Mauris tempor sit amet felis ut aliquet. Pellentesque viverra aliquam volutpat. Nunc ligula nunc, lacinia ut convallis vitae, dapibus at diam. Nulla eu leo tempus nibh rutrum convallis in sit amet ex. Pellentesque tristique fermentum massa, eu fringilla arcu varius placerat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ut erat at felis consectetur tincidunt. Vestibulum metus mi, finibus sed massa at, viverra commodo lorem. Vivamus sed risus pharetra, egestas mi a, posuere odio. Mauris quis velit et nisi interdum feugiat. Donec sagittis, justo at tempor luctus, lorem metus sollicitudin metus, eget cursus ex lacus quis diam. Vestibulum iaculis dolor eget leo pretium interdum.
                </p>
            </div><!--bloque-->
        </div>
    </div>

    <div class="container-fluid" id="servicios">
        <div class="container">
            <div class="bloque">
                <h1>Servicios</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in velit eget metus lobortis semper id vel ante. Mauris tempor sit amet felis ut aliquet. Pellentesque viverra aliquam volutpat. Nunc ligula nunc, lacinia ut convallis vitae, dapibus at diam. Nulla eu leo tempus nibh rutrum convallis in sit amet ex. Pellentesque tristique fermentum massa, eu fringilla arcu varius placerat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla ut erat at felis consectetur tincidunt. Vestibulum metus mi, finibus sed massa at, viverra commodo lorem. Vivamus sed risus pharetra, egestas mi a, posuere odio. Mauris quis velit et nisi interdum feugiat. Donec sagittis, justo at tempor luctus, lorem metus sollicitudin metus, eget cursus ex lacus quis diam. Vestibulum iaculis dolor eget leo pretium interdum.
                </p>
            </div><!--bloque-->
        </div>
    </div>

    <div class="container-fluid" id="contacto">
        <div class="container">
            <div class="bloque">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Contacto</h1>
                        <hr>
                        <form action="{{ url('contact') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label name="email">Email:</label>
                                <input id="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label name="subject">Asunto:</label>
                                <input id="subject" name="subject" class="form-control">
                            </div>

                            <div class="form-group">
                                <label name="message">Mensaje:</label>
                                <textarea id="message" name="message" class="form-control">Escribe tu mensaje aqui...</textarea>
                            </div>

                            <input type="submit" value="Enviar mensaje " class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div><!--bloque-->
        </div>
    </div>

@endsection