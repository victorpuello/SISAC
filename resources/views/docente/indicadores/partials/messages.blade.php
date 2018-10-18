@if ($errors->any())
    <input type="text" style="display: none" data-errores="{{$errors}}" id="errores">
@endif
@if(isset($data))
    <input type="text" style="display: none" data-error="El logro se encuentra duplicado, y no será guardado." id="duplicado">
@endif