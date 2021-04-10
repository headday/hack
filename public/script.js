let roleTrigger = document.querySelector('.role_select');

roleTrigger.addEventListener('change',(e)=>{
    let input = document.querySelector('.role_hr_input');
    if(e.target.value == 2){
        input.removeAttribute('hidden')
    }
    else{
        input.setAttribute('hidden',true)
    }
})

