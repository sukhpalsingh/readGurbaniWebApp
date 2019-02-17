<select
    @foreach($attributes as $attribute => $data)
        {{ $attribute }}="{{ $data }}"
    @endforeach
    class="form-control"
>
@foreach ($options as $option)
    <option value="{{ $option[0] }}" @if($option[0] == $value) selected="selected" @endif
    >{{ $option[1] }}</option>
@endforeach
</select>