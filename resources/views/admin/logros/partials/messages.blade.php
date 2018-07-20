@if ($errors->any())
    <input type="text" style="display: none" data-errores="{{$errors}}" id="errores">
@endif
@if (isset($mensaje))
    <input type="text" style="display: none" data-msg="{{$mensaje}}" id="msg">
@endif
