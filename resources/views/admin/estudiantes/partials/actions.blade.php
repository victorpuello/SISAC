<a href="{{route('estudiantes.edit', $id)}}" class="on-default edit-row "><i class="fas fa-pencil-alt"></i></a>
<a href="{{route('estudiantes.show', $id)}}" class="on-default show-row"><i class="far fa-eye"></i></a>
<a href="#" class="on-default remove-row" onclick="event.preventDefault();var form = document.getElementById('delete-form');form.setAttribute('action', '{{route('estudiantes.destroy', $id)}}');form.submit();"><i class="far fa-trash-alt"></i></a>
