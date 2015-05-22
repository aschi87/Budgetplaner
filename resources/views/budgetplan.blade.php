@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hier sind alle Budgetpläne aufgelistet.
                    </div>
                    <div class="panel-body">
                        @foreach ($budgetPlans as $budgetPlan)
                            <p>
                                <a href="{{ url('/plan/' . $budgetPlan->id) }}">
                                    {{ $budgetPlan->name }}
                                </a>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection