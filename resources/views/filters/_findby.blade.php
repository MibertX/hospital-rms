@if($filterFields)
    <form class="findby" action="{{Request::fullUrl()}}" method="get">
        <div class="input-group findby__input-group">
            <input type="text" class="form-control form-control-lg filter-value" name="filter-value" placeholder="Search">
            <span class="input-group-addon">
                <select name="filter-field">
                    @foreach($filterFields as $fieldname => $fieldLabel)
                        <option value="{{$fieldname}}">
                            {{$fieldLabel}}
                        </option>
                    @endforeach
                </select>
            </span>
        </div>
    </form>
@endif