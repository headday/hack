try {
function maskPhone(selector, masked = '+7 (___) ___-__-__') {
	const elems = document.querySelectorAll(selector);

	function mask(event) {
		const keyCode = event.keyCode;
		const template = masked,
			def = template.replace(/\D/g, ""),
			val = this.value.replace(/\D/g, "");
		console.log(template);
		let i = 0,
			newValue = template.replace(/[_\d]/g, function (a) {
				return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
			});
		i = newValue.indexOf("_");
		if (i !== -1) {
			newValue = newValue.slice(0, i);
		}
		let reg = template.substr(0, this.value.length).replace(/_+/g,
			function (a) {
				return "\\d{1," + a.length + "}";
			}).replace(/[+()]/g, "\\$&");
		reg = new RegExp("^" + reg + "$");
		if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) {
			this.value = newValue;
		}
		if (event.type === "blur" && this.value.length < 5) {
			this.value = "";
		}

	}

	for (const elem of elems) {
		elem.addEventListener("input", mask);
		elem.addEventListener("focus", mask);
		elem.addEventListener("blur", mask);
	}
	
}
maskPhone('.form-telephone')
} catch (error) {

}

try {

        let haveWork1 = document.querySelector('#have_work');
        let haventWork = document.querySelector('#havent_work')
        
        
        haveWork1.addEventListener('click',(e)=>{
            if(e.target.checked){
                 console.log('asd')
                 let block = document.querySelector('.stage-block')
                block.removeAttribute('hidden')
            }
            // else{
            //      console.log('asdasasd')
            //      let block = document.querySelector('.stage-block')
            //     block.setAttribute('hidden',true)
            // }  
        }) 

        haventWork.addEventListener('click',(e)=>{
            if(e.target.checked){
                console.log('asd')
                let block = document.querySelector('.stage-block')
                block.setAttribute('hidden',true)
            }
        })

    
                 
} catch (error) {
}


try {
    
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
