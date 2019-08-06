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


    // $('.slickCarousel').slick({
    //   dots: true,
    //   arrow:true,
    //   infinite: false,
    //   speed: 300,
    //   slidesToShow: 3,
    //   slidesToScroll: 3,
    //   responsive: [
    //     {
    //       breakpoint: 1024,
    //       settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 3,
    //         infinite: true,
    //         dots: true
    //       }
    //     },
    //     {
    //       breakpoint: 600,
    //       settings: {
    //         slidesToShow: 2,
    //         slidesToScroll: 2
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: {
    //         slidesToShow: 1,
    //         slidesToScroll: 1
    //       }
    //     }
    //     // You can unslick at a given breakpoint now by adding:
    //     // settings: "unslick"
    //     // instead of a settings object
    //   ]
    // });
});


$(document).on('click', '.preventDefault', function(e)
{
    e.preventDefault();
});

$(document).on('click', '.btnSubmitComment', function(e){

    e.preventDefault();


    $('#nameError').addClass("hidden");
    $('#commentError').addClass("hidden");
    $('#errorExists').addClass("hidden");

    $('#nameErrorModal').addClass("hidden");
    $('#commentErrorModal').addClass("hidden");
    $('#errorExistsModal').addClass("hidden");
    var errorExists = false;
    var name = $('#name').val();
    var email = $('#email').val();
    var comment = $('#comment').val();
    if(this.id == "btnSubmitComment"){
        name = $('#nameModal').val();
        comment = $('#comment').val();
    }
    else if(this.id == "btnSubmitCommentModal"){
        name = $('#nameModal').val();
        comment = $('#comment').val();
    }
    return;


    if(name == ""){
        if(this.id == "btnSubmitComment"){
            $('#nameError').removeClass("hidden");
        }
        else if(this.id == "btnSubmitCommentModal"){
            $('#nameErrorModal').removeClass("hidden");
        }
        errorExists = true;
    }

    if(comment == ""){
        if(this.id == "btnSubmitComment"){
            $('#commentError').removeClass("hidden");
        }
        else if(this.id == "btnSubmitCommentModal"){
            $('#commentErrorModal').removeClass("hidden");
        }
        errorExists = true;
    }

    if(errorExists){
        if(this.id == "btnSubmitComment"){
            $('#errorExists').removeClass("hidden");
        }
        else if(this.id == "btnSubmitCommentModal"){
            $('#errorExistsModal').removeClass("hidden");
        }
            
        return;
    }
    //alert(name + " " + phone + " " + comment); return;

    $.ajax({
        method: "GET",
        url: "/comments/store",
        data: {name:name, email:email, comment:comment},
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
            jsonObject = JSON.parse(data);
            console.log(jsonObject);

            if(jsonObject.hasOwnProperty("error")){
                $('#emailIncorrect').removeClass("hidden");
                $('#errorExists').removeClass("hidden");
                return;
            }

            var html = "";

            $("#commentModal").modal('hide');
            $('#name').val("");
            $('#email').val("");
            $('#comment').val("");
            for(var i = Object.keys(jsonObject).length - 1; i >= 0 ; i-- ){
                html += "<div class='row'>";
                html += "<div class='col-md-12'>";
                html += "<h4><strong>" + jsonObject[i].name + "</strong></h4>";
                html += "</div>";//col
                html += "</div>";//row

                html += "<div class='row'>";
                html += "<div class='col-md-12 text-muted'>";
                html += jsonObject[i].date_persian ;
                html += "</div>";//col
                html += "</div>";//row

                html += "<div class='row'>";
                html += "<div class='col-md-12'>";
                html += jsonObject[i].comment;
                html += "</div>";//col
                html += "</div>";//row

                html += "<hr/>";

            }

            $("#comments").html(html);


        },
        error:function(error){ }
    })

});

$(document).on('click', '.selectPrice', function(e){
    e.preventDefault();
    $("#selectedPrice").html($(this).find("span").html());
    $("#selectedDuration").html($(this).parent('.wow').find('h3').html());
    $('#priceModal').modal('show');


});

$(document).on('click', '#btnCancelPayment', function(e){
    e.preventDefault();
    $("#mobileNotRegisteredMessage").addClass("hidden");
    $("#btnProceedToPayment").addClass("hidden");
    $("#userNameRow").addClass("hidden");
    $('#priceModal').modal('hide');


});

$(document).on("click", "#btnVerifyMobileNumber", function(e){
    e.preventDefault();
    var mobileNumber = $("#mobileNumber").val();

    $.post("/user/verifyMobileNumberAjax",{mobile:mobileNumber}, function(data){
        // $("#btnSubmitMessage").hide('slow', function(){
        //     $("#btnCancelMessage").attr('class', 'btn btn-primary');
        //     $("#btnCancelMessage").html("تایید");
        //     $("#successMessage").show();
        // });
        console.log(data)

        if(data == ""){
            $("#mobileNotRegisteredMessage").removeClass("hidden");
            $("#btnProceedToPayment").addClass("hidden");
            $("#userNameRow").addClass("hidden");
            $("#userName").html("");
        }
        else{
            $("#mobileNotRegisteredMessage").addClass("hidden");
            $("#btnProceedToPayment").removeClass("hidden");
            $("#userNameRow").removeClass("hidden");
            $("#userName").html(data);

        }

    });

});

$(document).on('click', '#btnProceedToPayment', function(e){
    alert("در حال حاضر تمای خدمات به صورت رایگان و بدون هیچ گونه تعهدی ارائه داده میشود")
});
// $(document).on('click', '.submitEmail', function(e){

//     var messageText = $('#messageText').val();
//     alert(messageText);
//             $("#messageModal").modal('hide');
//     $.ajax({
//         //alert("boo");
//         method: "POST",
//         url: "/sendMail",
//         // data: $('#associatePersonalityWithFilmForm').serialize(),
//         success:function(data){
//             alert("success")
//             console.log(data);
//             var innerHtml = '';
//             // innerHtml = innerHtml + '<div class="btn-group">';
//             // innerHtml = innerHtml + '<button type="button" class="btn btn-warning dropdown-toggle" ';
//             // innerHtml = innerHtml + 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
//             // innerHtml = innerHtml + 'Added To Favorites<span class="caret"></span></button>';
//             // innerHtml = innerHtml + '<ul class="dropdown-menu">';
//             // innerHtml = innerHtml + '<li><a href="#" class="removeFromFavoriteOffices" ';
//             // innerHtml = innerHtml + ' officeId="'+officeId+'">Remove From Favorites</a></li>';
//             // innerHtml = innerHtml + '</ul>';
//             // innerHtml = innerHtml + '</div>';

//             // $('#addToFavoritesButtonContainer' + officeId).html(innerHtml);
//             $("#messageModal").modal('hide');
//         },
//         error:function(error){ console.log(error)}
//     })
// });
$(document).on('click', '.imgEnlargeable', function(e){

    var img = "<img class='img-responsive img-thumbnail' src='"+$(this).attr('src')+"'>"
    $('#imageModalImage').html(img);
    $('#imageModal').modal('show');
});


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

$(document).on('click', '.addToFavoriteResidences', function(e){
	e.preventDefault();
	// $('.btn').attr('disabled', true);
  	var residenceId = $(this).attr('residenceId');

	// alert($('#associatePersonalityWithFilmForm').serialize());
  	$.ajax({
        method: "POST",
        url: "/residences/"+residenceId+"/addToFavorites",
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
        	var innerHtml = '';
        	innerHtml = innerHtml + '<div class="btn-group">';
        	innerHtml = innerHtml + '<button type="button" class="btn btn-warning dropdown-toggle" ';
        	innerHtml = innerHtml + 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        	innerHtml = innerHtml + 'Added To Favorites<span class="caret"></span></button>';
        	innerHtml = innerHtml + '<ul class="dropdown-menu">';
        	innerHtml = innerHtml + '<li><a href="#" class="removeFromFavoriteResidences" ';
        	innerHtml = innerHtml + ' residenceId="'+residenceId+'">Remove From Favorites</a></li>';
        	innerHtml = innerHtml + '</ul>';
        	innerHtml = innerHtml + '</div>';

        	$('#addToFavoritesButtonContainer' + residenceId).html(innerHtml);

        },
        error:function(error){ }
    })
});

$(document).on('click', '.addToFavoriteOffices', function(e){
	e.preventDefault();
	// $('.btn').attr('disabled', true);
  	var officeId = $(this).attr('officeId');

	// alert($('#associatePersonalityWithFilmForm').serialize());
  	$.ajax({
        method: "POST",
        url: "/offices/"+officeId+"/addToFavorites",
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
        	console.log(data);
        	var innerHtml = '';
        	innerHtml = innerHtml + '<div class="btn-group">';
        	innerHtml = innerHtml + '<button type="button" class="btn btn-warning dropdown-toggle" ';
        	innerHtml = innerHtml + 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        	innerHtml = innerHtml + 'Added To Favorites<span class="caret"></span></button>';
        	innerHtml = innerHtml + '<ul class="dropdown-menu">';
        	innerHtml = innerHtml + '<li><a href="#" class="removeFromFavoriteOffices" ';
        	innerHtml = innerHtml + ' officeId="'+officeId+'">Remove From Favorites</a></li>';
        	innerHtml = innerHtml + '</ul>';
        	innerHtml = innerHtml + '</div>';

        	$('#addToFavoritesButtonContainer' + officeId).html(innerHtml);

        },
        error:function(error){ }
    })
});


$(document).on('click', '.removeFromFavoriteResidences', function(e){
	e.preventDefault();

	var residenceId = $(this).attr('residenceId');

	  $.ajax({
        method: "POST",
        url: "/residences/"+residenceId+"/removeFromFavorites",
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
        	var innerHtml = '';
        	innerHtml = innerHtml + '<button class="btn btn-primary addToFavoriteResidences" ';
        	innerHtml = innerHtml + 'residenceId="'+residenceId+'">Add To Favorites</button>';

        	$('#addToFavoritesButtonContainer' + residenceId).html(innerHtml);
        },
        error:function(error){ }
    })

});


$(document).on('click', '.removeFromFavoriteOffices', function(e){
	e.preventDefault();

	var officeId = $(this).attr('officeId');

	  $.ajax({
        method: "POST",
        url: "/offices/"+officeId+"/removeFromFavorites",
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
        	var innerHtml = '';
        	innerHtml = innerHtml + '<button class="btn btn-primary addToFavoriteOffices" ';
        	innerHtml = innerHtml + 'officeId="'+officeId+'">Add To Favorites</button>';

        	$('#addToFavoritesButtonContainer' + officeId).html(innerHtml);
        },
        error:function(error){ }
    })
});

$(document).on('keyup', '#propertyFormAgencyName', function(e){
	$('#agencySelected').attr('class', 'hidden glyphicon glyphicon-check');
	//reset agency ID back to zero
	$('#selectedAgencyId').val(0);
	if($(this).val().length == 0)
	{
		$('#suggestedAgenciesContainer').html('');
		return;
	}

	var numAgencies = $('#numAgencies').val();
	var input = $(this).val();
	var html = "<ul class='list-group'>";
	var noResult = true;
	var selectedAgencyId = "";
	var counter = 0;
	for(var i = 0; i < numAgencies; i++)
	{
		if($('#agency' + i).attr('agencyName').toUpperCase().indexOf(input.toUpperCase()) > -1)
		{	counter++;
			noResult = false;
			html = html + "<li class='list-group-item suggestedAgency'>";
			html = html + "<a href='' class='preventDefault suggestedAgencyId' id='" + $('#agency' + i).val() + "'";
			html = html + " agencyName='" + $('#agency' + i).attr('agencyName') + "''>";
			html = html + $('#agency' + i).attr('agencyName') + "</a></li>";
			// if(counter == 1)
			// {
			// 	selectedAgencyId = $('#agency' + i).val();
			// }
			// else
			// 	selectedAgencyId = "0";
		}
	
		// var match = $('#agency' + i).attr('agencyName').match('/si/gi');
	}
	html = html + "</ul>";
	$('#suggestedAgenciesContainer').html(html);
	// if(counter == 1)
	// 	$("#selectedAgencyId").val(selectedAgencyId);
	// else
	// 	$("#selectedAgencyId").val('0');
});


$(document).on('click', '.suggestedAgencyId', function(){
    $('#selectedAgencyId').val($(this).attr('id'));
    $('#propertyFormAgencyName').val($(this).attr('agencyName'));
    $('#suggestedAgenciesContainer').html('');
    $('#agencySelected').attr('class', 'glyphicon glyphicon-check');
});


$(document).on('keyup', '#formPropertyAddress', function(e){
    $('#propertySelected').attr('class', 'hidden glyphicon glyphicon-check');
    //reset agency ID back to zero
    $('#selectedPropertyId').val(0);
    if($(this).val().length == 0)
    {
        $('#suggestedPropertiesContainer').html('');
        return;
    }

    var numProperties = $('#numProperties').val();
    var input = $(this).val();
    var html = "<ul class='list-group'>";
    var noResult = true;
    var selectedPropertyId = "";
    var counter = 0;
    for(var i = 0; i < numProperties; i++)
    {
        if($('#property' + i).attr('propertyAddress').toUpperCase().indexOf(input.toUpperCase()) > -1)
        {   counter++;
            noResult = false;
            html = html + "<li class='list-group-item suggestedProperty'>";
            html = html + "<a href='' class='preventDefault suggestedPropertyId' id='" + $('#property' + i).val() + "'";
            html = html + " propertyAddress='" + $('#property' + i).attr('propertyAddress') + "''>";
            html = html + $('#property' + i).attr('propertyAddress') + "</a></li>";

        }
    
    }
    html = html + "</ul>";
    $('#suggestedPropertiesContainer').html(html);
});


$(document).on('click', '.suggestedPropertyId', function(){
    $('#selectedPropertyId').val($(this).attr('id'));
    $('#formPropertyAddress').val($(this).attr('propertyAddress'));
    $('#suggestedPropertiesContainer').html('');
    $('#propertySelected').attr('class', 'glyphicon glyphicon-check');
});