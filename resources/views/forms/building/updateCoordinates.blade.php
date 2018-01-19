<form class="d-none" action="{{ route("building.updateCoordinates", ["id" => "id"]) }}" method="post" id="updateCoordinatesForm">
    {{ csrf_field() }}
    <input type="hidden" name="latitude">
    <input type="hidden" name="longitude">
</form>
