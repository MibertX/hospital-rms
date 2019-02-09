<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{ __('Patient Details') }}
            </div>

            <div class="card-block">
                <table class="table table-striped">
                    <tr>
                        <th>{{__('Email')}}</th>
                        <td><a href="mailto:{{$patient->email}}" target="_blank">{{$patient->email}}</a></td>
                    </tr>

                    <tr>
                        <th>{{__('Phone')}}</th>
                        <td>{{$patient->phone}}</td>
                    </tr>

                    <tr>
                        <th>{{__('Birthday')}}</th>
                        <td>{{$patient->birthday}} ({{__('Age')}}: {{$patient->age}})</td>
                    </tr>

                    <tr>
                        <th>{{__('Address')}}</th>
                        <td>{{$patient->address}}</td>
                    </tr>

                    <tr>
                        <th>{{__('Notes')}}</th>
                        <td><pre class="notes">{{$patient->notes}}</pre></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>