function eliminarvideo(id, token) {
    $.ajax({
                url: '/deletevid/'+id,
                method: 'delete',
                data: {
                    '_token': token,
                },
                error: function(response){
                    var alertDiv = `<div class="modal fade" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold">Delete Error</h5>
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
                    
                    document.getElementById(id).remove()
                }
            });
}