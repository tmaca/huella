<form action="{{ route("admin.mail.reply", ["id" => 0]) }}" method="post" novalidate data-action-url="{{ route("admin.mail.reply", ["id" => "id"])}}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="for" class="control-label">Para</label>

        <input type="email" name="for" id="for" class="form-control{{ $errors->has("for") ? " is-invalid" : "" }}" value="{{ old("for") }}" readonly>
        @if ($errors->has('for'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('for') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="subject" class="control-label">Asunto</label>

        <input type="text" name="subject" id="subject" class="form-control{{ $errors->has("subject") ? " is-invalid" : "" }}" value="{{ old("subject") }}">
        @if ($errors->has('subject'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('subject') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="message" class="control-label">Mensaje</label>

        <textarea name="message" id="message" rows="10" class="form-control{{ $errors->has("message") ? " is-invalid" : "" }}" autofocus value="{{ old("message") }}"></textarea>
        @if ($errors->has('message'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('message') }}</strong>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-default">
        <div class="fa fa-envelope-o"></div>
        Enviar
    </button>

</form>

@if(Request::session()->get("replyFailed"))
<script type="text/javascript">
    $("#reaplyUserModal").modal("show");
</script>
@endif
