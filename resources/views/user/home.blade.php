@extends("layouts.main")

@section("title", "Login")

@section("content")
<div id="wrapper">
    <div class="menuUser">
        <div class="navbar navbar-inverse navbar-fixed-left">
            <a class="navbar-brand" href="#">Usuario #1</a>
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Sub Menu1</a></li>
                        <li><a href="#">Sub Menu2</a></li>
                        <li><a href="#">Sub Menu3</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Sub Menu4</a></li>
                        <li><a href="#">Sub Menu5</a></li>
                    </ul>
                </li>
                <li><a href="#">Alcance 1</a></li>
                <li><a href="#">Alcance 2</a></li>
                <li><a href="#">Alcance 3</a></li>

            </ul>
        </div>
    </div><!--menuUser-->


    <div id="formularioUser">

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
                <textarea id="message" name="message" class="form-control" placeholder="Escribe tu mensaje aqui..."></textarea>
            </div>

            <input type="submit" value="Enviar mensaje " class="btn btn-success"/>
        </form>

    </div>
</div><!--wrapper-->


@endsection