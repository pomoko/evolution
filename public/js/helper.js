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

$(document).on('change', '#selectOrder', function(e){

    e.preventDefault();
    var order = $("#selectOrder").val();
    var isFa = true;
    if($("#lang").html() == "en"){
        isFa = false;
    }


    $.ajax({
        method: "GET",
        url: "/comments/getAll",
        data: {order:order},
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
            jsonObject = JSON.parse(data);
            console.log(jsonObject);
            var html = "";

            if(order == 0){
                for(var i = Object.keys(jsonObject).length - 1; i >= 0 ; i-- ){
                    //if(i==1){
                        // var d = new Date(jsonObject[i].created_at);
                        // alert(d.getMonth());
                    //}
                    var commentDate = "";
                    if(isFa){
                        commentDate = jsonObject[i].date_persian;
                    }
                    else{
                        var currentDate = new Date(jsonObject[i].created_at)
                        commentDate = convertGregorianMonthNumToName(currentDate.getMonth() + 1) + " " + currentDate.getDate() + ", " + currentDate.getFullYear();
                    }
                    html += "<div class='row'>";
                    html += "<div class='col-md-12'>";
                    html += "<h4><strong>" + jsonObject[i].name + "</strong></h4>";
                    html += "</div>";//col
                    html += "</div>";//row

                    html += "<div class='row'>";
                    html += "<div class='col-md-12 text-muted'>";
                    html += commentDate;
                    html += "</div>";//col
                    html += "</div>";//row

                    html += "<div class='row'>";
                    html += "<div class='col-md-12'>";
                    html += jsonObject[i].comment;
                    html += "</div>";//col
                    html += "</div>";//row

                    html += "<hr/>";

                }               
            }

            if(order == 1){
                for(var i = 0; i <= Object.keys(jsonObject).length - 1 ; i++ ){
                    var commentDate = "";
                    if(isFa){
                        commentDate = jsonObject[i].date_persian;
                    }
                    else{
                        var currentDate = new Date(jsonObject[i].created_at)
                        //alert(convertGregorianMonthNumToName(currentDate.getMonth() + 1));
                        commentDate = convertGregorianMonthNumToName(currentDate.getMonth() + 1) + " " + currentDate.getDate() + ", " + currentDate.getFullYear();
                    }
                    html += "<div class='row'>";
                    html += "<div class='col-md-12'>";
                    html += "<h4><strong>" + jsonObject[i].name + "</strong></h4>";
                    html += "</div>";//col
                    html += "</div>";//row

                    html += "<div class='row'>";
                    html += "<div class='col-md-12 text-muted'>";
                    html += commentDate;
                    html += "</div>";//col
                    html += "</div>";//row

                    html += "<div class='row'>";
                    html += "<div class='col-md-12'>";
                    html += jsonObject[i].comment;
                    html += "</div>";//col
                    html += "</div>";//row

                    html += "<hr/>";

                }               
            }

            $("#comments").html(html);
        },
        error:function(error){ }
    })


});

$(document).on('click', '.delete', function(e){
    e.preventDefault();
    e.preventDefault();
    var container = $(this).parents('.commentContainer');
    var id = container.find(".commentId").val();
    
    if (confirm("Are you sure you want to delete")) {
        $.ajax({
            method: "POST",
            url: "/comments/delete",
            data: {id:id},
            // data: $('#associatePersonalityWithFilmForm').serialize(),
            success:function(data){
                container.hide("slow");
            },
            error:function(error){ }
        }) 
    } 
});

$(document).on('click', '.update', function(e){
    e.preventDefault();
    $(this).parents('.commentContainer').find('.commentUpdate').removeClass('hidden');
    $(this).parents('.commentContainer').find('.commentTextRow').addClass('hidden');

});

$(document).on('click', '.btnUpdateSubmit', function(e){
    e.preventDefault();
    var container = $(this).parents('.commentContainer');
    var id = container.find(".commentId").val()
    var comment = container.find(".inputCommentUpdate").val();
    $.ajax({
        method: "POST",
        url: "/comments/update",
        data: {id:id, comment:comment},
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
 

            container.find('.commentUpdate').addClass('hidden');
            container.find('.commentTextRow').removeClass('hidden');
            container.find('.commentText').html(container.find(".inputCommentUpdate").val());  

        },
        error:function(error){ }
    })  

});

$(document).on('click', '.btnUpdateCancel', function(e){
    e.preventDefault();
    $(this).parents('.commentContainer').find('.commentUpdate').addClass('hidden');
    $(this).parents('.commentContainer').find('.commentTextRow').removeClass('hidden');

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
        name = $('#name').val();
        comment = $('#comment').val();
    }
    else if(this.id == "btnSubmitCommentModal"){
        name = $('#nameModal').val();
        comment = $('#commentModal').val();
    }


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

    $.ajax({
        method: "GET",
        url: "/comments/store",
        data: {name:name, comment:comment},
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

            $("#addCommentModal").modal('hide');
            $('#name').val("");
            $('#comment').val("");
            $('#nameModal').val("");
            $('#commentModal').val("");
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
            var numComments = Object.keys(jsonObject).length;
            if($("#lang").html() == "fa"){
                numComments = convertNumberToPersian(numComments);
            }
            $("#numComments").html("(" + numComments + ")");


        },
        error:function(error){ }
    })

});


$(document).on('click', '#btnSendMailDep', function(e){

    e.preventDefault();

    // $('#nameError').addClass("hidden");
    // $('#commentError').addClass("hidden");
    // $('#errorExists').addClass("hidden");

    // $('#nameErrorModal').addClass("hidden");
    // $('#commentErrorModal').addClass("hidden");
    // $('#errorExistsModal').addClass("hidden");
    // var errorExists = false;
    // var name = $('#name').val();
    // var email = $('#email').val();
    // var comment = $('#comment').val();
    // if(this.id == "btnSubmitComment"){
    //     name = $('#name').val();
    //     comment = $('#comment').val();
    // }
    // else if(this.id == "btnSubmitCommentModal"){
    //     name = $('#nameModal').val();
    //     comment = $('#commentModal').val();
    // }


    // if(name == ""){
    //     if(this.id == "btnSubmitComment"){
    //         $('#nameError').removeClass("hidden");
    //     }
    //     else if(this.id == "btnSubmitCommentModal"){
    //         $('#nameErrorModal').removeClass("hidden");
    //     }
    //     errorExists = true;
    // }

    // if(comment == ""){
    //     if(this.id == "btnSubmitComment"){
    //         $('#commentError').removeClass("hidden");
    //     }
    //     else if(this.id == "btnSubmitCommentModal"){
    //         $('#commentErrorModal').removeClass("hidden");
    //     }
    //     errorExists = true;
    // }

    // if(errorExists){
    //     if(this.id == "btnSubmitComment"){
    //         $('#errorExists').removeClass("hidden");
    //     }
    //     else if(this.id == "btnSubmitCommentModal"){
    //         $('#errorExistsModal').removeClass("hidden");
    //     }
            
    //     return;
    // }

    // var to = "info@symphonyofevolution.com";
    var name = $('#name').val();
    var email = $('#email').val();
    var subject = $('#subject').val();
    var message = $('#message').val();
    var file = $('#file').val();
    alert(email);
    $.ajax({
        method: "POST",
        url: "/contact/sendMail",
        data: {name:name, email:email, subject:subject, message:message, file:file},
        // data: $('#associatePersonalityWithFilmForm').serialize(),
        success:function(data){
            jsonObject = JSON.parse(data);
            console.log(jsonObject);

            if(jsonObject.hasOwnProperty("error")){
                $('#emailIncorrect').removeClass("hidden");
                $('#errorExists').removeClass("hidden");
                return;
            }

            // $("#addCommentModal").modal('hide');
            // $('#name').val("");
            // $('#comment').val("");
            // $('#nameModal').val("");
            // $('#commentModal').val("");



        },
        error:function(error){ }
    })

});



$(document).on('click', '#btnProceedToPayment', function(e){
    alert("در حال حاضر تمای خدمات به صورت رایگان و بدون هیچ گونه تعهدی ارائه داده میشود")
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});


function convertNumberToPersian(numberLatin){

    numberLatin = numberLatin.toString()
    var numberLength = numberLatin.length;

    var numberPersian = '';
    //loop through each number in the string
    for(var index = 0; index < numberLength; index++)
    {                
        //get the current number
        var currentCase = numberLatin.substring(index, index + 1);// substr(numberLatin, index, 1);
        switch(currentCase)
        {     

            case '0':
                numberPersian += '۰';
                break;   
            case '1':
                numberPersian +=  '۱';
                break;
            case '2':
                numberPersian +=  '۲';
                break;
            case '3':
                numberPersian += '۳';
                break;
            case '4':
                numberPersian += '۴';
                break;
            case '5':
                numberPersian += '۵';
                break;
            case '6':
                numberPersian += '۶';
                break;
            case '7':
                numberPersian += '۷';
                break;
            case '8':
                numberPersian += '۸';
                break;
            case '9':
                numberPersian += '۹';
                break;
            default:
                numberPersian += currentCase;
                break;

        }
    }
    return numberPersian;
}
function convertGregorianMonthNumToName(monthNum){
    var monthName = '';
    //loop through each number in the string
    switch(monthNum)
    {     
 
        case 1:
            monthName =  "Jan.";
            break;
        case 3:
            monthName =  "Feb.";
            break;
        case 3:
            monthName = "Mar.";
            break;
        case 4:
            monthName = "Apr.";
            break;
        case 5:
            monthName = "May.";
            break;
        case 6:
            monthName = "Jun.";
            break;
        case 7:
            monthName = "Jul.";
            break;
        case 8:
            monthName = "Aug.";
            break;
        case 9:
            monthName = "Sep.";
            break;
        case 10:
            monthName = "Oct.";
            break;
        case 11:
            monthName = "Nov.";
            break;
        case 12:
            monthName = "Dec.";
            break;
        default:
            monthName = "";
            break;

    }
    return monthName;
}



