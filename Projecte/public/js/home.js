function cambiarCategoria(id, token) {
    
    $.ajax({
        url: '/cambiarCategoria',
        method: 'post',
        data: {
            '_token': token,
            'id': id
        },
        error: function(response){
            var alertDiv = `<div class="modal fade" id="modal">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Category Error</h5>
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
            //alert("Has de fer login per a poder comentar!");
        },
        success: function(response) {
            document.getElementById('categoria').innerHTML = response['name'];
            document.getElementById('videos').innerHTML = response['content'];
        }
    });
    
}