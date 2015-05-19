@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hier können Sie einen Budgetplan erstellen</div>

                    <div class="panel-body">
                        <form class="form-inline" action="" method="POST">
                            <div class="form-group">
                                <label for="budgetPlanName">Budgetplan-Name:</label>
                                <input id="budgetPlanName" type="text" class="form-control" name="budgetPlanName" required> </input>
                            </div>
                            <button class="btn btn-default" type="button" action="submit">Hinzufügen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection