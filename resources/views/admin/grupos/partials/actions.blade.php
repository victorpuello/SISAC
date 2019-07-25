<a href="{{route('grupos.edit', $id)}}" class="on-default edit-row "><i class="fas fa-pencil-alt"></i></a>
<a href="{{route('grupos.show', $id)}}" class="on-default show-row"><i class="far fa-eye"></i></a>
<a href="#" class="on-default remove-row" onclick="event.preventDefault();var form = document.getElementById('delete-form');form.setAttribute('action', '{{route('grupos.destroy', $id)}}');form.submit();"><i class="far fa-trash-alt"></i></a>
