function addToList() {

    // Read the date and put it in the right format.
    var datDate = $(datepicker).datepicker({
        dateFormat: 'dd.mm.yyyy'
    }).val();

    var datPosten = $('#posten').val();
    var datSelect = $('#select :selected').text();
    var datBetrag = $('#betrag').val();


    var table = document.getElementById("table");
    var row = table.insertRow(1);
    var datum = row.insertCell(0);
    var posten = row.insertCell(1);
    var kat = row.insertCell(2);
    var betrag = row.insertCell(3);
    var btnCell = row.insertCell(4);

    //alert(table.rows.length);

    datum.innerHTML = datDate;
    posten.innerHTML = datPosten;
    kat.innerHTML = datSelect;
    betrag.innerHTML = datBetrag;

    btnCell = $("#myButton").click(function () {
        var test = $('<button/>', {
            text: 'Test',
            click: function () {
                alert('hi');
            }
        });
        //var parent = $('<tr><td></td></tr>').children().append(test).end();
        //$("#table").before(parent);
    });
}

function beDifferent() {
    var amountValue = $('#betrag').val();
    var dateValue = $(datepicker).datepicker({
        dateFormat: 'dd.mm.yyyy'
    }).val();
    var nameValue = $('#posten').val();
    var categoryValue = $('#select :selected').text();

    var table = document.getElementById("table");
    var row = table.insertRow(1);
    var date = row.insertCell(0);
    var name = row.insertCell(1);
    var category = row.insertCell(2);
    var amount = row.insertCell(3);

    date.innerHTML = dateValue;
    name.innerHTML = nameValue;
    category.innerHTML = categoryValue;
    amount.innerHTML = amountValue;
}