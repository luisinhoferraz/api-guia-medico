function printContent(e){
    var printContents = document.getElementById(e).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function narrowList(e){
    $('.'+e).attr("class","impressao");
}

function returnList(e){
    $('.'+e).attr("class","lista");
}