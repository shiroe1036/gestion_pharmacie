$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })

    $('.test').on('input', function(){
        autoCompleteTest('.test', '.idtest')
    })

    function autoCompleteTest(input, inputId){
        $(input).autocomplete({
            source: function( request, response ) {
                // Fetch data
                $.ajax({
                  url:"../medoc/test",
                  type: 'get',
                  dataType: "json",
                  data: {
                     search: request.term
                  },
                  success: function( data ) {
                     response( data );
                  }
                });
              },
            select: function(event, ui){
                event.preventDefault()
                $(inputId).val(ui.item.id)
                $(input).val(ui.item.value)
            }
        })
    }
})