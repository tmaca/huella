@extends("layouts.main")

@section("content")

@include("elements.userNavbar")

<div class="mt-3">
    @yield("userContent")
</div>

@endsection
