@extends('app')

@section('content')

    <div class = "container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Übersicht:
            </div>

            <div class="panel-body">
                Total Ausgaben: {{$sum}}
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Budget: {{ $budget->name }}</div>

                    <div class="panel-body">
<!-- ENTRY BUTTON -->
                        <button id="btnEntry"  type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Eintrag
                        </button>
<!-- CATEGORY BUTTON -->
                        <button id="btnCategory" type="button" class="btn btn-default"  data-toggle="modal" data-target="#categoryModal">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Kategorie
                        </button>
<!-- SHARE BUTTON -->
                        <button id="btnShare" type="button" class="btn btn-default"  data-toggle="modal" data-target="#shareModal">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Budget teilen
                        </button>


<!-- CATEGORY MODAL -->
                        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Teile Budget mit:</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="shareForm" class="form-horizontal" action="{{$id}}/share" method="POST">
                                            <select multiple class="form-control" name="users[]">
                                                @foreach ($sharable as $u)
                                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                                @endforeach

                                            </select>
                                            <input type="hidden" name="planId" value="{{$id}}"> </input>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}"> </input>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="$('#shareForm').submit();">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- CATEGORY MODAL -->
                        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Neue Kategorie</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" id="categoryForm" action="{{$id}}/saveCategory" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kategorie:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="category" required> </input>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Limite:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="limit" required> </input>
                                                </div>
                                            </div>
                                            <input type="hidden" id="planId" name="planId" value="{{$id}}"> </input>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}"> </input>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="$('#categoryForm').submit();">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- ENTRY MODAL -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Neuer Eintrag</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" id="entriesForm" action="{{$id}}/saveEntry" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Datum:</label>
                                                <div class="col-sm-8">
                                                    <input id="datepicker" name="date" type="text" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Posten:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" required> </input>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kategorie:</label>
                                                <div class="col-sm-8">
                                                    <select id="select" name="category" required>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Betrag: CHF</label>
                                                <div class="col-sm-8">
                                                    <input type="number" step="any" min="0" id="amount" name="amount" required> </input>
                                                </div>
                                            </div>
                                            <input type="hidden" id="planId" name="planId" value="{{$id}}"> </input>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}"> </input>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="$('#entriesForm').submit();">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>


<!-- TABLE CREATION -->
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
                                @foreach ($categories as $category)
                                    @foreach ($category->entries as $entry)
                                        <tr>
                                            <td>
                                                {{$entry->date}}
                                            </td>
                                            <td>
                                                {{$entry->name}}
                                            </td>
                                            <td>
                                                {{$category->name}}
                                            </td>
                                            <td>
                                                {{$entry->amount}}
                                            </td>
                                        </tr>
                                    @endforeach
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