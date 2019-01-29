<a class="btn btn-none dropdown-toggle dropdown-filter" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" id="{{$fieldName}}__filter">
    {{$fieldLabel}}
    <span class="dropdown-filter__selected">
        &nbsp;{{$currentChoice ? $currentChoice['label'] : 'All'}}
    </span>
</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="status__filter">
    @php($filterGetParams = array_except(Request::query(), [$fieldName, 'page']))
    <a href="{{$currentChoice ? route(Route::currentRouteName(), $filterGetParams) : '#'}}" class="dropdown-item {{ $currentChoice ? '' : 'selected' }}">All</a>
    @foreach($availableChoices as $value => $label)
        @php($isSelected = $value == @$currentChoice['value'])
        <a href="{{$isSelected ? '#' : route(Route::currentRouteName(), array_merge($filterGetParams, [$fieldName => $value])) }}" class="dropdown-item {{ $isSelected ? 'selected': ''}}">
            {{$label}}
        </a>
    @endforeach
</div>
