@foreach($devotions as $devotion)
	<tr class="unread" style="cursor: pointer;" onclick="window.location='{{ Url('devotion/' . $devotion->id) }}'">
		<td class="hidden-xs">
			<span><input type="checkbox" class="checkbox-mail"></span>
		</td>
		<td class="hidden-xs">
			{{$devotion->title}}
		</td>
		<td>
			{{ str_limit($devotion->description, 78, ' (.....)') }}
		</td>
		<td>
			{{$devotion->created_at}}
		</td>
	</tr>
@endforeach