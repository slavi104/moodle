'use strict'

$(document).ready(function() {

    function searchFunction() {

        $('body').css('cursor', 'auto');
        $('#search-input').prop('disabled', false);

        //$('#search-input').on('keydown', function(){

        if ($('#search-input').val().length < 1) {
            return;
        };

        $('#search-input').off();
        $('body').css('cursor', 'wait');
        $('#search-input').prop('disabled', true);
        //console.log($('#search-input').val());

        $.ajax({
            url: "search.php",
            type: "post",
            data: {
                text_search: $('#search-input').val()
            },
            dataType: 'html'
        }).done(function(data) {
            //console.log(data);
            if (data != false) {
                $("#wrapper1").empty();
                $("#wrapper1").append(data);
            }

            $('body').css('cursor', 'auto');
            $('#search-input').prop('disabled', false);

            $(document).off();
            $(document).keypress(function(e) {
                if (e.which == 13) {
                    searchFunction();
                }
            });
            //$("#pages").addClass("hidden");
            //searchFunction();
        });


        //});
    }

    $(document).keypress(function(e) {
        if (e.which == 13) {
            searchFunction();
        }
    });

    $(".nav-buttons").mouseover(function() {
	    if ($(this).children().last().attr('class') == "subMenu") {
	        $(this).children().last().show();
	    };

	});
	$(".nav-buttons").mouseout(function() {
	    if ($(this).children().last().attr('class') == "subMenu") {
	        $(this).children().last().hide();
	    }
	});

	$('#login-trigger').on('click', function(e) {

	    e.preventDefault();

	    if ($(this).attr('data-open') == 0) {
	        $('#login-aside').show();
	        $('#right-logo').hide();
	        $(this).css('color', 'black');
	        $(this).attr('data-open', 1);
	    } else {
	        $('#login-aside').hide();
	        $('#right-logo').show();
	        $(this).css('color', 'white');
	        $(this).attr('data-open', 0);
	    };


	});

});