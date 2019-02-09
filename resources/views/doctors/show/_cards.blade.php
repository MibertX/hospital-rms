<div class="row">
    <div class="col-sm-6 col-md-4">
        @component('appshell::widgets.card_with_icon', [
                'icon' => $doctor->status->isAvailable() ? 'account-circle' : 'account-o',
                'type' => $doctor->status->isAvailable() ? 'success' : 'warning'
        ])
            {{ $doctor->name }}
            @if (!$doctor->user->is_active)
                <small>
                        <span class="badge badge-default">
                            {{ __('inactive') }}
                        </span>
                </small>
            @endif
            @slot('subtitle')
                {{ __('Work since') }}
                {{ $doctor->created_at->format(__('Y-m-d H:i')) }}
            @endslot
        @endcomponent
    </div>

    <div class="col-sm-6 col-md-4">
        @component('appshell::widgets.card_with_icon', [
                'icon' => 'shield-security',
                'type' => 'info'
        ])
            {{$doctor->status}}

            @slot('subtitle')
                {{ __('Roles')}}:
                @if($doctor->user->roles->count())
                    {{ $doctor->user->roles->take(3)->implode('name', ' | ') }}
                @else
                    {{ __('no roles') }}
                @endif

                @if($doctor->user->roles->count() > 3)
                    | {{ __('+ :num more...', ['num' => $user->roles->count() - 3]) }}
                @endif
            @endslot
        @endcomponent
    </div>

    <div class="col-sm-6 col-md-4">
        @component('appshell::widgets.card_with_icon', ['icon' => 'star-circle'])
            {{ $doctor->user->login_count }} {{ __('logins') }}

            @slot('subtitle')
                @if ($doctor->user->last_login_at)
                    {{ __('Last login') }}
                    {{ $doctor->user->last_login_at->diffForHumans() }}
                @else
                    {{ __('never logged in') }}
                @endif

            @endslot
        @endcomponent
    </div>

</div>