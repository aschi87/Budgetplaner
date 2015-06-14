@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Übersicht der Ausgaben</div>
                    <div class="panel-body">
                        @foreach ($budgetPlans as $budgetPlan)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                            <p>
                                                <b>{{ $budgetPlan->name }} :</b> {{number_format($budgetPlan->sum(), 2) }} <b>Limite:</b> CHF {{number_format($budgetPlan->totalLimit(), 2)}}
                                                <br>
                                                Du hast <b>{{ number_format($budgetPlan->percent(), 2)}} %</b>  ausgegeben.

                                                <div class="progress">
                                                    @if ($budgetPlan->percent() < 70)
                                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width:{{ number_format($budgetPlan->percent(), 2)}}%">
                                                            Ok
                                                        </div>
                                                    @elseif($budgetPlan->percent() < 90)
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width:{{ number_format($budgetPlan->percent(), 2)}}%">
                                                            Bald Monatsende?
                                                        </div>
                                                    @else
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width:{{ number_format($budgetPlan->percent(), 2)}}%">
                                                            Aufpassen!
                                                        </div>
                                                    @endif
                                                </div>
                                            </p>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                @foreach ($budgetPlan->categories as $category)
                                    <p>
                                        In der Kategorie <b>{{$category->name}}</b> verbleiben noch: {{number_format($category->moneyLeft(), 2)}}
                                    </p>
                                @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection