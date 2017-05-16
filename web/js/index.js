$( document ).ready(function () {
    $("#appbundle_contact_town").keyup(function () {
        var town = $(this).val();
        if ( town.length >= 2 ) {
            $.ajax({
                type: "POST",
                url : "/town/" + town,
                dataType: 'json',
                timeOut: 3000,
                success: function(response) {
                    var towns = JSON.parse(response.data);
                    html = "";
                    for (i = 0; i < towns.length; i++) {
                        html += "<li>" + towns[i].town + "</li>";
                    }
                    $('#autocomplete').html(html);
                    $('#autocomplete li').on('click', function () {
                        $('appbundle_contact_town').val($(this).text());
                        $('#autocomplete').html('');
                    });
                },
                error: function(){
                    $('#autocomplete').text('Ajax call error');
                }
                });
            }else {
            $('#autocomplete').html('');
        }
    });
});