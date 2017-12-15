@extends("layouts.main")

@section("title", "Huella")

@section("content")
    <div class="container">
        <h3>Mensajes de usuarios</h3>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="text-center">
                <td>Email</td>
                <td>Asunto</td>
                <td>Mensaje</td>
            </tr>
            </thead>
            <tbody>
            @if($mails->count() > 0)
                @foreach($mails as $mails)
                    <tr class="text-center">
                        <td class="email">{{ $mails->email }}</td>
                        <td class="subject">{{ $mails->subject }}</td>
                        <td class="message">{{ $mails->message }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>