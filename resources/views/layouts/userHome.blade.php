@extends("layouts.main")

@section("content")

@include("elements.userNavbar")

<div class="mt-3" id="userContent">
    @yield("userContent")
</div>

@endsection
