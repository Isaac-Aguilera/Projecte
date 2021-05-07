function eliminarComentari(id, token) {
    $.ajax({
        url: '/comentari/'+id,
        method: 'delete',
        data: {
            '_token': token,
        },
        error: function(response){
            alert(response['statusText']);
        },
        success: function(response) {
            console.log();
            if(!response['comentaris']) {
                document.getElementById('comentaris').innerHTML += '<h5>No hi han comentaris!</h5><hr>';
            }
            document.getElementById(id).remove();
        }
    });
}
function afegirComentari(video_id, token) {
    contingut = document.getElementById('contingut').value;
    $.ajax({
        url: '/comentari',
        method: 'post',
        data: {
            '_token': token,
            'video_id': video_id,
            'contingut': contingut
        },
        error: function(response){
            //alert(response['statusText']);
            alert("Has de fer login per a poder comentar!");
        },
        success: function(response) {
            afegir = '<div id='+response['id']+'><a href="/user/'+response['nick']+'"><img class="mr-1"style="border-radius:50%;width:2.5vw;min-width:40px;min-height:40px;"src="/'+response['image']+'"></a><span>'+response['nick']+'</span><button onclick="eliminarComentari('+response['id']+')" class="btn btn-primary" type="submit" >✘</button><p>'+contingut+'</p><hr></div>'
            if(response['comentaris']==1) {
                document.getElementById('comentaris').innerHTML = afegir;
            } else {
                document.getElementById('comentaris').innerHTML += afegir;
            }
            
        }
    });
}
function like(id,votacio, token) {
    if (votacio == 'like') {
        if (document.getElementById("like_"+id).className == "bi bi-hand-thumbs-up") {
            $.ajax({
                url: '../vot',
                method: 'post',
                data: {
                    '_token': token,
                    'id': id,
                    'votacio': votacio
                },
                error: function(response){
                    //alert(response['statusText']);
                    alert("Has de fer login per a poder votar!");
                },
                success: function(response) {
                    document.getElementById("dislike_"+id+"_count").innerHTML = response['dislikes'];
                    document.getElementById("dislike_"+id).className = "bi bi-hand-thumbs-down";
                    document.getElementById("like_"+id+"_count").innerHTML = response['likes'];
                    document.getElementById("like_"+id).className = "bi bi-hand-thumbs-up-fill";
                }
            });
        } else {
            $.ajax({
                url: '../vot',
                method: 'delete',
                data: {
                    '_token': token,
                    'id': id 
                },
                error: function(response){
                    //alert(response['statusText']);
                    alert("Has de fer login per a poder votar!");
                },
                success: function(response){
                    document.getElementById("like_"+id+"_count").innerHTML = response['likes'];
                    document.getElementById("like_"+id).className = "bi bi-hand-thumbs-up";
                }
            });
        }
    } else {
        if (document.getElementById("dislike_"+id).className == "bi bi-hand-thumbs-down") {
            $.ajax({
                url: '../vot',
                method: 'post',
                data: {
                    '_token': token,
                    'id': id,
                    'votacio': votacio
                },
                error: function(response){
                    //alert(response['statusText']);
                    alert("Has de fer login per a poder votar!");
                },
                success: function(response) {
                    document.getElementById("like_"+id+"_count").innerHTML = response['likes'];
                    document.getElementById("like_"+id).className = "bi bi-hand-thumbs-up";
                    document.getElementById("dislike_"+id+"_count").innerHTML = response['dislikes'];
                    document.getElementById("dislike_"+id).className = "bi bi-hand-thumbs-down-fill";
                }
            });
        } else {
            $.ajax({
                url: '../vot',
                method: 'delete',
                data: {
                    '_token': token,
                    'id': id
                },
                error: function(response){
                    //alert(response['statusText']);
                    alert("Has de fer login per a poder votar!");
                },
                success: function(response){
                    document.getElementById("dislike_"+id+"_count").innerHTML = response['dislikes'];
                    document.getElementById("dislike_"+id).className = "bi bi-hand-thumbs-down";
                }
            });
        }
    }
}

function valorar(name, id, video_id, token) {
    if(document.getElementById(name+(id).toString()).classList.contains('perma') && (id + 1 == 6 || !document.getElementById(name+(id + 1).toString()).classList.contains('perma'))) {
        $.ajax({
            url: '../valoracio',
            method: 'delete',
            data: {
                '_token': token,
                'video_id': video_id,
                'name': name 
            },
            error: function(response){
                if(response['statusText'] == "Unauthorized") {
                    alert("Has de fer login per a poder valorar!");
                } else {
                    alert(response['statusText']);
                } 
            },
            success: function(response){
                Object.entries(response['mitjanes']).forEach(([key, value])=> {
                    document.getElementById(key).innerHTML = value;
                });
                document.getElementById(name+(1).toString()).classList.remove('perma');
                document.getElementById(name+(2).toString()).classList.remove('perma');
                document.getElementById(name+(3).toString()).classList.remove('perma');
                document.getElementById(name+(4).toString()).classList.remove('perma');
                document.getElementById(name+(5).toString()).classList.remove('perma');
            }
        });
    } else {
        $.ajax({
            url: '../valoracio',
            method: 'post',
            data: {
                '_token': token,
                'video_id': video_id,
                'votacio': id,
                'name': name 
            },
            error: function(response){
                if(response['statusText'] == "Unauthorized") {
                    alert("Has de fer login per a poder valorar!");
                } else {
                    alert(response['statusText']);
                } 
            },
            success: function(response){
                Object.entries(response['mitjanes']).forEach(([key, value])=> {
                    document.getElementById(key).innerHTML = value;
                });
                perma(name,id);
            }
        });
    }
}

function cmbst(name, id) {

    if (id == 1) {
        document.getElementById(name+id.toString()).classList.add('checked');
    }
    if (id == 2) {
        document.getElementById(name+(id - 1).toString()).classList.add('checked');
        document.getElementById(name+id.toString()).classList.add('checked');
    }
    if (id == 3) {
        document.getElementById(name+(id - 2).toString()).classList.add('checked');
        document.getElementById(name+(id - 1).toString()).classList.add('checked');
        document.getElementById(name+id.toString()).classList.add('checked');
    }
    if (id == 4) {
        document.getElementById(name+(id - 3).toString()).classList.add('checked');
        document.getElementById(name+(id - 2).toString()).classList.add('checked');
        document.getElementById(name+(id - 1).toString()).classList.add('checked');
        document.getElementById(name+id.toString()).classList.add('checked');
    }
    if (id == 5) {
        document.getElementById(name+(id - 4).toString()).classList.add('checked');
        document.getElementById(name+(id - 3).toString()).classList.add('checked');
        document.getElementById(name+(id - 2).toString()).classList.add('checked');
        document.getElementById(name+(id - 1).toString()).classList.add('checked');
        document.getElementById(name+id.toString()).classList.add('checked');
    }

}

function cmbst2(name, id) {
    if (id == 1) {
        document.getElementById(name+id.toString()).classList.remove('checked');
    }

    if (id == 2) {
        document.getElementById(name+(id - 1).toString()).classList.remove('checked');
        document.getElementById(name+id.toString()).classList.remove('checked');
    }
    if (id == 3) {
        document.getElementById(name+(id - 2).toString()).classList.remove('checked');
        document.getElementById(name+(id - 1).toString()).classList.remove('checked');
        document.getElementById(name+id.toString()).classList.remove('checked');
    }
    if (id == 4) {
        document.getElementById(name+(id - 3).toString()).classList.remove('checked');
        document.getElementById(name+(id - 2).toString()).classList.remove('checked');
        document.getElementById(name+(id - 1).toString()).classList.remove('checked');
        document.getElementById(name+id.toString()).classList.remove('checked');
    }
    if (id == 5) {
        document.getElementById(name+(id - 4).toString()).classList.remove('checked');
        document.getElementById(name+(id - 3).toString()).classList.remove('checked');
        document.getElementById(name+(id - 2).toString()).classList.remove('checked');
        document.getElementById(name+(id - 1).toString()).classList.remove('checked');
        document.getElementById(name+id.toString()).classList.remove('checked');
    }
}
function perma(name, id) {
    if (id == 1) {
        document.getElementById(name+id.toString()).classList.add('perma');
        document.getElementById(name+(id + 1).toString()).classList.remove('perma');
        document.getElementById(name+(id + 2).toString()).classList.remove('perma');
        document.getElementById(name+(id + 3).toString()).classList.remove('perma');
        document.getElementById(name+(id + 4).toString()).classList.remove('perma');
    }
    if (id == 2) {
        document.getElementById(name+(id - 1).toString()).classList.add('perma');
        document.getElementById(name+id.toString()).classList.add('perma');
        document.getElementById(name+(id + 1).toString()).classList.remove('perma');
        document.getElementById(name+(id + 2).toString()).classList.remove('perma');
        document.getElementById(name+(id + 3).toString()).classList.remove('perma');
    }
    if (id == 3) {
        document.getElementById(name+(id - 2).toString()).classList.add('perma');
        document.getElementById(name+(id - 1).toString()).classList.add('perma');
        document.getElementById(name+id.toString()).classList.add('perma');
        document.getElementById(name+(id + 1).toString()).classList.remove('perma');
        document.getElementById(name+(id + 2).toString()).classList.remove('perma');
    }
    if (id == 4) {    
        document.getElementById(name+(id - 3).toString()).classList.add('perma');
        document.getElementById(name+(id - 2).toString()).classList.add('perma');
        document.getElementById(name+(id - 1).toString()).classList.add('perma');
        document.getElementById(name+id.toString()).classList.add('perma');
        document.getElementById(name+(id + 1).toString()).classList.remove('perma');
    }
    if (id == 5) {
        document.getElementById(name+(id - 4).toString()).classList.add('perma');
        document.getElementById(name+(id - 3).toString()).classList.add('perma');
        document.getElementById(name+(id - 2).toString()).classList.add('perma');
        document.getElementById(name+(id - 1).toString()).classList.add('perma');
        document.getElementById(name+id.toString()).classList.add('perma');
    }
}
