@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Budget-Übersicht</div>

				<div class="panel-body">
					Hallo {{ $user->name }}! Hier sind deine Budgets:

                    <br />
                    <br />
                    <br />

                    @if (count($budgetPlans) === 0)
                        Sie haben noch keine Budgetpläne erstellt.
                    @else
                        @foreach ($budgetPlans as $budgetPlan)
                            <p>
                                <a href="{{ url('/plan/' . $budgetPlan->id) }}">
                                    {{ $budgetPlan->name }}
                                </a>
                            </p>
                        @endforeach
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
