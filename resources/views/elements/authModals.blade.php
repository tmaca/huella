<!-- Modal Login -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                @include("forms.auth.login")
            </div>
        </div>

    </div>
</div>

<!-- Modal Register -->
<div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registro</h4>
            </div>
            <div class="modal-body">
                @include("forms.auth.register")
            </div>
        </div>

    </div>
</div>

@if(Request::session()->get("loginFailed"))
    <script>
        $("#loginModal").modal("show");
    </script>
@endif

@if(Request::session()->get("registerFailed"))
    <script>
        $("#registerModal").modal("show");
    </script>
@endif