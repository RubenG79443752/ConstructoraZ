$(document).ready(function(){

    $('.calc').on('keyup change',function() {
    var importe_total = 0
        $(".calc").each(
        function(index, value) {
            if ( $.isNumeric( $(this).val() ) ){
            importe_total = importe_total + eval($(this).val());
            //console.log(importe_total);
            }
        }
        );
            $("#iva_14").val(importe_total);
    });

 });
