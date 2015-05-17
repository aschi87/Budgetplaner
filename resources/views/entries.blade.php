@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Budget: {{$budgetPlans[0]->name}}</div> <!-- Wie macht man die 0 dynamisch?-->

                    <div class="panel-body">

                        <button id="btnEntry" type="button" class="myButton" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Eintrag
                        </button>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Neuer Eintrag</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">Datum:</div>
                                            <div class="col-md-4">
                                                <input class="datepicker" id="datepicker" data-date-format="yyyy/mm/dd" type="date">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">Posten:</div>
                                            <div class="col-md-4">
                                                <input type="text" id="posten"> </input>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">Kategorie:</div>
                                            <div class="col-md-4">
                                                <select id="select">
                                                    @foreach ($categoryIdName as $cat)
                                                        <option value="kategorie1">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">Betrag: CHF</div>
                                            <div class="col-md-4">
                                                <input type="text" id="betrag"> </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="addToList()">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <table id="table" class="table table-striped table-bordered center" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>Posten</th>
                                    <th>Kategorie</th>
                                    <th>Betrag</th>
                                    <th>Edit/Delete</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($entriesFromUserOne as $entries)

                                    <tr>
                                        <td>
                                            {{$entries->date}}
                                        </td>
                                        <td>
                                            {{$entries->entryName}}
                                        </td>
                                        <td>
                                            <?php $index = $entries->categoryName; ?>
                                            {{$index}}

                                        </td>
                                        <td>
                                            {{$entries->amount}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection