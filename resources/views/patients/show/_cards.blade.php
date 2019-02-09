<div class="row">
    <div class="col-sm-6 col-md-4">
        @component('appshell::widgets.card_with_icon', [
                'icon' => $patient->status->isDischarged() ? 'account-circle' : 'account-o',
                'type' => $patient->status->isDischarged() ? 'success' : 'warning'
        ])
            {{ $patient->name }}
            @if (!$patient->user->is_active)
                <small>
                        <span class="badge badge-default">
                            {{ __('inactive') }}
                        </span>
                </small>
            @endif
            @slot('subtitle')
                {{ __('Created at') }}
                {{ $patient->created_at->format(__('Y-m-d H:i')) }}
            @endslot
        @endcomponent
    </div>

    <div class="col-sm-6 col-md-4">
        @component('appshell::widgets.card_with_icon', [
                'icon' => 'shield-security',
                'type' => 'info'
        ])
            {{$patient->status}}

            @slot('subtitle')
                {{ __('Roles')}}:
                @if($patient->user->roles->count())
                    {{ $patient->user->roles->take(3)->implode('name', ' | ') }}
                @else
                    {{ __('no roles') }}
                @endif

                @if($patient->user->roles->count() > 3)
                    | {{ __('+ :num more...', ['num' => $patient->user->roles->count() - 3]) }}
                @endif
            @endslot
        @endcomponent
    </div>

    <div class="col-sm-6 col-md-4">
        @component('appshell::widgets.card_with_icon', ['icon' => 'star-circle'])
            {{ $patient->user->login_count }} {{ __('logins') }}

            @slot('subtitle')
                @if ($patient->user->last_login_at)
                    {{ __('Last login') }}
                    {{ $patient->user->last_login_at->diffForHumans() }}
                @else
                    {{ __('never logged in') }}
                @endif

            @endslot
        @endcomponent
    </div>

</div>