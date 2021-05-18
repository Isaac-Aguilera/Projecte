function editDesc(token) {
       
    $valueDesc = document.getElementById("descSpan").innerHTML;
    $colDesc = document.getElementById("colDesc");
    $colDesc.innerHTML = "";
    $colDesc.innerHTML += '<p class="font-weight-bold">Description</p>';
    $colDesc.innerHTML += '<hr>';
    $colDesc.innerHTML += '<textarea id="desctextarea" class="form-control" rows="5">'+$valueDesc+'</textarea><br>';
    $colDesc.innerHTML += '<input id="ShowButton" class="btn btn-lg btn-block btn-success mb-3" type="submit" value="Save" onclick="guardarDesc(\''+token+'\')">';
}

function guardarDesc(token) {

    desc = document.getElementById("desctextarea").value;

    $.ajax({
                url: '/canviardesc',
                method: 'POST',
                data: {
                    '_token': token,
                    'desc': desc,
                },
                error: function(response){
                    var alertDiv = `<div class="modal fade" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold">Description Error</h5>
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
                    $colDesc = document.getElementById("colDesc");
                    $colDesc.innerHTML = "";

                    $colDesc.innerHTML += '<p class="font-weight-bold">Description</p>';
                    $colDesc.innerHTML += '<hr>';
                    $colDesc.innerHTML += '<button id="desc" class="btn btn-light" style="border-radius: 0;" onclick="editDesc(\''+token+'\')"><i class="bi bi-pencil-fill" style="font-size: 1.5rem;"></i></button>';
                    $colDesc.innerHTML += '<span id="descSpan" class="ml-2">'+desc+'</span>';

                }
            });
}