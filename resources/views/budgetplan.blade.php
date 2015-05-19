@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hier können Sie einen Budgetplan erstellen</div>

                    <div class="panel-body">
                        <form class="form-horizontal" id="form">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Budgetplan-Name:</label>
                                <div class="col-sm-8">
                                    <input type="text"  id="budgetPlanName" name="budgetPlanName" required> </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label align-left">Neue Kategorie:</label>
                                <div class="col-sm-8">
                                    <input type="text" id="" name="" required> </input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection