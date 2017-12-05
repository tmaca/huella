@extends("layouts.main")

@section("title", "Huella")

@section("content")
    <div class="container">
        <h3>Lista de usuarios <span class="badge">{{ $users->count() }}</span></h3>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <td>#</td>
                    <td>Nombre</td>
                    <td>NIF</td>
                    <td>Teléfono</td>
                    <td>Año</td>
                    <td>Email</td>
                    <td>Estado de la cuenta</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @if($users->count() > 0)
                    @foreach($users as $user)
                    <tr class="text-center">
                        <td class="id">{{ $user->id }}</td>
                        <td class="name">{{ $user->name }}</td>
                        <td class="nif">{{ $user->nif }}</td>
                        <td class="telephone" data-phone="{{ $user->telephone }}">
                            <a href="tel:{{ $user->telephone }}">
                                <i class="fa fa-phone"></i>
                                ({{ $user->telephone }})
                            </a>
                        </td>
                        <td class="year">{{ $user->year }}</td>
                        <td class="email" data-email="{{ $user->email }}">
                            <a href="mailto:{{ $user->email }}">
                                <i class="fa fa-envelope"></i>
                                ({{ $user->email }})
                            </a>
                        </td>
                        <td class="verified" data-verified="{{ $user->verified ? "1" : "0"}}">
                            @if($user->verified)
                            <span class="text-success">Verificada</span>
                            @else
                            <span class="text-danger">No verificada</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-info" data-action="edit">
                                    <fa class="fa fa-pencil"></fa>
                                </button>
                                <button class="btn btn-danger" data-action="delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <form class="hidden" action="{{ route("admin.user.delete", ["id" => $user->id]) }}" method="post">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center text-info">
                            No existe ningún usuario registrado
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="modal fade" tabindex="-1" role="dialog" id="editUserModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span   aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar Usuario</h4>
                    </div>
                    <div class="modal-body">
                        @include("forms.admin.editUser")
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            addRemoveEvent();
            addEditEvent();
        }, false);

        function addRemoveEvent() {
            for (element of document.querySelectorAll("[data-action=\"delete\"]")) {
                element.addEventListener("click", deleteUser, false);
            }
        }

        function addEditEvent() {
            for (element of document.querySelectorAll("[data-action=\"edit\"]")) {
                element.addEventListener("click", editUser, false);
            }
        }

        function deleteUser() {
            console.log(this);
            swal({
                title: "Eliminar usuario",
                text: "Esta accción no puede ser revertida, ¿deseas continuar?",
                icon: "warning",
                dangerMode: true,
                buttons: {
                    cancel: "No, cancelar",
                    confirm: {
                        text: "Si, eliminar"
                    }
                }
            }).then((value) => {
                if (value) {
                    this.parentNode.getElementsByTagName("form")[0].submit();
                }
            });
        }

        function editUser() {
            let row = this;
            while(row.tagName != "TR") {
                row = row.parentNode;
            }

            document.getElementById("id").value = row.getElementsByClassName("id")[0].innerText;
            document.getElementById("name").value = row.getElementsByClassName("name")[0].innerText;
            document.getElementById("nif").value = row.getElementsByClassName("nif")[0].innerText;
            document.getElementById("telephone").value = row.getElementsByClassName("telephone")[0].getAttribute("data-phone");
            document.getElementById("year").value = row.getElementsByClassName("year")[0].innerText;
            document.getElementById("email").value = row.getElementsByClassName("email")[0].getAttribute("data-email");

            if (row.getElementsByClassName("verified")[0].getAttribute("data-verified") == "1") {
                document.querySelector("input[name=\"verified\"][value=\"1\"]").checked = true;

            } else {
                document.querySelector("input[name=\"verified\"][value=\"0\"]").checked = true;
            }

            $("#editUserModal").modal("show");
        }
    </script>
@endsection
