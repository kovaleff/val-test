let state = [];

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrf
    }
});

$('#field td').click(function(){
     that = this;
     jQuery.ajax({
            url: '/state',
            method: 'GET'
        }).done(function(data){
        state = data;

         fillFields();

         let id =  parseInt(that.getAttribute('id'));
         if(state[id] == 0){
             state[id] = gamerId;
             that.innerHTML = gamerId;
         } else{
             alert('Уже занято!')
         }

         let gamerFinishedId = checkFinished();
         let mess = 'Игра закончена!';
         if(gamerFinishedId != false && gamerFinishedId != 0){
             if(gamerFinishedId == -1)  mess = 'Ничья!';
             jQuery.post('/finish',{gamerFinishedId:gamerFinishedId});
             alert('Игра закончена!')
             window.location.replace('/');
         }


         jQuery.post('/state',{state:state})
    });
})

function fillFields(){
    state.forEach(function(item, index){
        jQuery('#field td')[index].innerHTML = item;
    })
}

function checkFinished(){
    if([state[0], state[1], state[2]].every(el => el == state[0])) return state[0];
    if([state[0], state[3], state[4]].every(el => el == state[0])) return state[0];
    if([state[2], state[5], state[8]].every(el => el == state[2])) return state[2];
    if([state[6], state[7], state[8]].every(el => el == state[6])) return state[6];
    if([state[0], state[4], state[8]].every(el => el == state[0])) return state[0];
    if([state[2], state[4], state[6]].every(el => el == state[2])) return state[2];
    if(!state.includes('0')) return -1;
    return false
}
function fetchdata() {
    jQuery.ajax({
        url: '/state',
        method: 'get',
        success: function (data) {
            state = data;
            fillFields();
        },
        complete: function (data) {
            setTimeout(fetchdata, 500);
        }
    });
}

jQuery(document).ready(function(){
    setTimeout(fetchdata,500);
});
