<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{ __('Doctor Details') }}
            </div>

            <div class="card-block">
                <table class="table table-striped">
                    <tr>
                        <th>{{__('Email')}}</th>
                        <td><a href="mailto:{{$doctor->email}}" target="_blank">{{$doctor->email}}</a></td>
                    </tr>

                    <tr>
                        <th>{{__('Phone')}}</th>
                        <td>{{$doctor->phone}}</td>
                    </tr>

                    <tr>
                        <th>{{__('Birthday')}}</th>
                        <td>{{$doctor->birthday}} ({{__('Age')}}: {{$doctor->age}})</td>
                    </tr>

                    <tr>
                        <th>{{__('Address')}}</th>
                        <td>{{$doctor->address}}</td>
                    </tr>

                    <tr>
                        <th>{{__('Notes')}}</th>
                        <td><pre class="notes">{{$doctor->notes}}</pre></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>