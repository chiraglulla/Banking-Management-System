const inputs = document.querySelectorAll('.validate')
console.log(inputs)
const patterns = {
    to : /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    amount: /^[1-9]([0-9]+)?$/
}

let check = function(inputField, regex){
    // console.log(regex.test(inputField.value)) //returns boolean 
    
    if(regex.test(inputField.value)){
        inputField.classList.remove('invalid')
        inputField.classList.add('valid')
    }else{
        inputField.classList.remove('valid')
        inputField.classList.add('invalid')
    }
}

inputs.forEach(input => {
    input.addEventListener('focusout', e => {
      console.log(e.target.getAttribute('name'))
      console.log(e.target.value)
        check(e.target, patterns[e.target.getAttribute('name')])  
    })
})