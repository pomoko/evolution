$(document).ready(function(){

    $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });

	$.ajaxSetup({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    // $(".sendMail").click(function (e){

    //     alert("OK");
    // });

    // $(document).on('click', '.sendMail', function(e){
    //     alert("hello");
    //     e.preventDefault();
    //     // $('.btn').attr('disabled', true);
    //     var residenceId = $(this).attr('residenceId');

    //     var senderName = $(".senderName").val();
    //     var senderEmail = $(".senderEmail").val();
    //     var emailSubject = $(".emailSubject").val();
    //     var emailMessage = $(".emailMessage").val();
    //             console.log(senderName);

    // return;
    //     // alert($('#associatePersonalityWithFilmForm').serialize());
    //     $.ajax({
    //         method: "POST",
    //         url: "/residences/"+residenceId+"/addToFavorites",
    //         // data: $('#associatePersonalityWithFilmForm').serialize(),
    //         success:function(data){
    //             var innerHtml = '';
    //             innerHtml = innerHtml + '<div class="btn-group">';
    //             innerHtml = innerHtml + '<button type="button" class="btn btn-warning dropdown-toggle" ';
    //             innerHtml = innerHtml + 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    //             innerHtml = innerHtml + 'Added To Favorites<span class="caret"></span></button>';
    //             innerHtml = innerHtml + '<ul class="dropdown-menu">';
    //             innerHtml = innerHtml + '<li><a href="#" class="removeFromFavoriteResidences" ';
    //             innerHtml = innerHtml + ' residenceId="'+residenceId+'">Remove From Favorites</a></li>';
    //             innerHtml = innerHtml + '</ul>';
    //             innerHtml = innerHtml + '</div>';

    //             $('#addToFavoritesButtonContainer' + residenceId).html(innerHtml);

    //         },
    //         error:function(error){ }
    //     })
    // });

});

