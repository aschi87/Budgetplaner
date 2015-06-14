@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Budget-Übersicht
                </div>
                <div>
                    <button id="btnAddBudget" type="button" class="btn btn-default pull-right"  data-toggle="modal" data-target="#addBudgetModal">
                        <i class="glyphicon glyphicon-plus-sign"></i> Budgetplan
                    </button>
                </div>


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

                <div class="modal fade" id="addBudgetModal" tabindex="-1" role="dialog" aria-labelledby="addBudgetModal" data-target="#addBudget" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Neuer Budgetplan</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" id="addBudgetForm" method="POST">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Name:</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" required> </input>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}"> </input>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                                <button type="button" class="btn btn-primary" onclick="$('#addBudgetForm').submit();">Speichern</button>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
		</div>
	</div>
</div>
@endsection
