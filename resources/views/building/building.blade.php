@extends("layouts.userHome")

@section("title", "Edificios")

@section("userContent")
    <div class="container">
        <h3>Lista de Edificios</h3>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <td class="d-none">#</td>
                    <td>Nombre</td>
                    <td>Alcance</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @if($buildings->count() > 0)
                    @foreach($buildings as $building)
                    <tr class="text-center">
                        <td class="id d-none">{{ $building->id }}</td>
                        <td class="name">{{ $building->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('alcances') }}" title="Calcular Alcance">
                                <fa class="fa fa-calculator"></fa> Calcular Alcance
                            </a>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-info" data-action="edit" title="Editar edificio">
                                    <fa class="fa fa-pencil"></fa>
                                </button>
                                <form class="d-none" action="{{ route("building.delete", ["id" => $building->id]) }}" method="post">
                                    {{ csrf_field() }}
                                </form>
                                <button class="btn btn-danger" data-action="delete" title="Eliminar edificio">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center text-info">
                            No has añadido ningún edificio
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#addBuildingModal">
            Añadir edificio
            <i class="fa fa-plus"></i>
        </button>

        <div class="modal fade" tabindex="-1" role="dialog" id="addBuildingModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Añadir Edificio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        @include("forms.building.addBuilding")
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="editBuildingModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Edificio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span   aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        @include("forms.building.editBuilding")
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/user/buildingManagement.js"></script>
@endsection
