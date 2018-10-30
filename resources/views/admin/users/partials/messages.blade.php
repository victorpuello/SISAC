@if ($errors->any())
    <input type="text" style="display: none" data-errores="{{$errors}}" id="errores">
@endif
@if (isset($data))
    <input type="text" style="display: none" data-success="{{ dd($data) }}" id="success">
@endif
