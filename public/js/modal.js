jQuery(function($){
   $('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});
});

function addToList() {

    var amountValue = $('#betrag').val();
    var dateValue = $("#datepicker").datepicker({dateFormat: 'dd-mm-yy'}).val();
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

    $.post($("#planId").val() + "/add", $("#entriesForm").serialize() , function( data ) {    });
}