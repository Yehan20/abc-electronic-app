function loginValidate(){
       


        const adminUserinput = document.getElementById('adminUsername')
        const adminPasswordinput = document.getElementById('adminPassword')
        const error=document.querySelectorAll('#err');
        const button =document.querySelector('#btnSubmit');
        if(adminUserinput===null || adminPasswordinput===null)return;
  

        adminUserinput.addEventListener('blur',()=>{
            if(adminUserinput.value===''){
                error[0].textContent='Cannot be Empty';
                button.setAttribute('disabled','true');

            }
            else{
                error[0].textContent='';
                error[2].textContent=''
            
            }
            if(adminPasswordinput.value!=='' && adminUserinput.value!==''){
                button.disabled=false;
            }
                

        })

        adminPasswordinput.addEventListener('blur',()=>{
            if(adminPasswordinput.value===''){
                error[1].textContent='Cannot be Empty';
                button.setAttribute('disabled','true');
            }

            else{
                error[1].textContent='';
                error[2].textContent=''
            
            }
            if(adminPasswordinput.value!=='' && adminUserinput.value!==''){
                button.disabled=false;
                }
                

        })

        button.addEventListener('click',(e)=>{
            if(adminPasswordinput.value==='' || adminUserinput.value===''){
                e.preventDefault();
                
                error[2].textContent='Fill all the feilds'
                setTimeout(()=>{
                  error[2].textContent='';
                },2000)
            }
        })


}

loginValidate();
signupValidate();

function signupValidate(){
    
 const userName=document.getElementById('userName');
const fullName=document.getElementById('userFullname');
const userPassword=document.getElementById('userPassword');
const userConfirm=document.getElementById('confirm');
const userDate=document.getElementById('birthday');
const userErr=document.querySelectorAll('#Usererr');
const sendBtn=document.getElementById('registerBtn');
const checkBox=document.getElementById('check')



if(userName===null || fullName===null || userPassword===null || userConfirm===null || userDate===null  || userErr===null) return;

userName.addEventListener('blur',()=>{

    if(userName.value===''){
        userErr[0].textContent='Required';
        userName.style.outline=` 2px solid red`;
        sendBtn.setAttribute('disabled','true');
     
    }
    else if(userName.value.length<4){
        userErr[0].textContent='Username Must be Morethan 5 characters';
        userName.style.outline=` 2px solid red`;
        sendBtn.setAttribute('disabled','true');
    }

  
    else{
        userErr[0].textContent='';
        let form = document.querySelector('form');
        
        const url = new URLSearchParams();

        for(const data of new FormData(form)){
            url.append(data[0],data[1]);
           
        }
        url.append('result',1);
        fetch('mvc/controller.php',{
            method:"post",
            body:url
        }).then(res=>res.text()).then(response=>{
            if(response==0){
                console.log('User is Okay');
                userName.style.outline=` 2px solid green`;
                sendBtn.disabled=false;
            }
            else{
                userName.style.outline=` 2px solid red`;
                userErr[0].textContent=`That userName is Taken`
                sendBtn.setAttribute('disabled','true');
            }
        }).catch(err=>console.log(err));
        
    
    }


})

fullName.addEventListener('blur',()=>{
   
    let regex=/([a-zA-z]+\s)*[a-zA-z]$/;

   
    if(fullName.value===''){
        userErr[1].textContent='Required';
        fullName.style.outline=` 2px solid red`;
        sendBtn.setAttribute('disabled','true');
    }
    else if(!regex.test(fullName.value)){
        userErr[1].textContent='Invalid Format'
        sendBtn.setAttribute('disabled','true');
        fullName.style.outline=` 2px solid red`;
    }
    
    else{
        userErr[1].textContent='';
        fullName.style.outline=` 2px solid green`;
        sendBtn.disabled=false;
    }

  

 
})

userDate.addEventListener('blur',()=>{

  
    if(userDate.value===''){
        userErr[2].textContent='Required';
        userDate.style.outline=` 2px solid red`;
        sendBtn.setAttribute('disabled','true');
    }
    else{
        userErr[2].textContent='';
        userDate.style.outline=` 2px solid green`;
        sendBtn.disabled=false;

    }
 
})


userPassword.addEventListener('blur',()=>{

    if(userPassword.value===''){
        userErr[4].textContent='Required';
        userPassword.style.outline=` 2px solid red`;
        sendBtn.setAttribute('disabled','true');
    }
    else if(userPassword.value.length<4){
        userErr[4].textContent='Password must be more than 5 characters';
        userPassword.style.outline=`2px solid red`;
        userConfirm.style.outline=`2px solid red`;
        sendBtn.setAttribute('disabled','true');
    }
    else{
        userErr[4].textContent='';
        userPassword.style.outline=` 2px solid green`;
        userConfirm.style.outline=` 2px solid green`;
        sendBtn.disabled=false;
    }
 

})

userConfirm.addEventListener('blur',()=>{

    if(userConfirm.value===''){
        userErr[5].textContent='Required';
        userConfirm.style.outline=` 2px solid red`;
        sendBtn.setAttribute('disabled','true');
    }
    else{
        userErr[5].textContent='';
        sendBtn.disabled=false;
        
    }

    if(!(userPassword.value===userConfirm.value)){
        userErr[5].textContent='Not matching';
        userErr[4].textContent='Not matching';
        userConfirm.style.outline=` 2px solid red`;
        userPassword.style.outline=`2px solid red`;
        sendBtn.setAttribute('disabled','true');
    }

    
 
})

console.log(checkBox);
checkBox.addEventListener('change',()=>{
    if(checkBox.checked){
        console.log('checked');
        sendBtn.disabled=false;
    }
    else{
        console.log('not checked');
        sendBtn.setAttribute('disabled','true');
    }
})

sendBtn.addEventListener('click',(e)=>{
    const result =document.getElementById('result');
    console.log(checkBox.checked);
    if(userName.value==='' || fullName.value==='' || userDate.value==='' || userPassword.value==='' || userConfirm==='' || !(checkBox.checked)){
        e.preventDefault();
        result.textContent='Fill all Feilds'
        setTimeout(()=>{
            result.textContent=''
        },2000)
        
        
    }
    if(userPassword.value!==userConfirm.value){
        e.preventDefault();
        result.textContent='Passwords should match'
        setTimeout(()=>{
            result.textContent=''
        },2000)

    }
    
  
    if(userName.style.outline===`red solid 2px`|| fullName.style.outline===`red solid 2px`){
           
        e.preventDefault();
        result.textContent='Check Name or Username again';
        setTimeout(()=>{
            result.textContent=''
        },2000)
  
    }
    
    
})

}

