function netejarnoti(token) {
    $.ajax({
        url: '/netejarnoti',
        method: 'POST',
        data: {
            '_token': token,
        },
        error: function(response){
            var alertDiv = `<div class="modal fade" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold">Notification Error</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>`+response['statusText']+`</p>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    document.getElementById("container").innerHTML+=alertDiv;
                    $('#modal').modal('toggle'); 
        },
        success: function(response) {
            
            document.getElementById("notinumber").innerHTML = "0";
        }
    });
}

$(document).ready(function(){
    $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });
});