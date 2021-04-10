let roleTrigger = document.querySelector('.role_select');

try {
    roleTrigger.addEventListener('change',(e)=>{
        let input = document.querySelector('.role_hr_input');
        if(e.target.value == 2){
            input.removeAttribute('hidden')
        }
        else{
            input.setAttribute('hidden',true)
        }
    })
} catch (error) {
}
try {
    let search = document.querySelector('.form-control');
    let resumeName = document.querySelectorAll('.card-body .card-title');
    search.addEventListener('input',(e)=>{
        resumeName.forEach((item) =>{
            if(!item.textContent.startsWith(e.target.value)){
            
                item.parentNode.parentNode.setAttribute('hidden',true);
            }else{
                item.parentNode.parentNode.removeAttribute('hidden')
            }
        })
    })
    
} catch (error) {
    
}