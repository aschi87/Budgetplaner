@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Übersicht der Ausgaben</div>
                    <div class="panel-body">
                        @foreach ($budgetPlans as $budgetPlan)
                            <p>
                                {{ $budgetPlan->name }} : {{$budgetPlan->sum($budgetPlan->id)}}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection