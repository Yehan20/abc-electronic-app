// Calling all the methods

operate();

userOption();

paying();

finalize();



function operate(){
    const updateBtn = document.querySelectorAll('#updateBtn');
    const updateModel = document.querySelector('#updateModel')
    const deleteBtn = document.querySelectorAll('#deleteBtn');

    if(updateBtn===null ||deleteBtn===null)return;
    
    updateBtn.forEach(upbtn=>{
    
        upbtn.addEventListener('click',(e)=>{
            const parent=(e.target.parentElement.parentElement);
            let childs=parent.children;
            console.log(childs);
            let stk =(childs[4].textContent).split('$');
            let num=(childs[0].textContent).split(':')
            console.log('ff',stk[1],num[1]);
        
             document.querySelector('#number').value=(num[1]);
             document.querySelector('#newName').value=childs[1].textContent;
              document.querySelector('#newPrice').value=Number(stk[1]);
             document.querySelector('#newDescription').value=childs[2].textContent;
        })
    })
    
    deleteBtn.forEach(del=>{
        del.addEventListener('click',(e)=>{
            console.log(e.target);
            let val = e.target.parentElement.parentElement.children;
            let temp=val[0].textContent.split(':');
            console.log(temp);
            document.querySelector('#delnumber').value=temp[1];
    
        })
        
    })
}




function userOption(){
     
    // a displaying data in the add go cart 
const usersCard=  document.querySelectorAll('#usersCard');


const addCart = document.querySelectorAll('#cart');
if(addCart===null)return;
let amt
addCart.forEach(cart=>{
  cart.addEventListener('click',(e)=>{
      let temp= e.target.parentElement.children;
      
      let hide = document.querySelector('#hideTypes').value;
      console.log(temp);
      let stk =(temp[4].textContent).split('$');
      amt=temp[4].innerText.split('-')[1]
      console.log(Number(amt));

      // need to assingn the values of the card to the wolf
      document.querySelector('#itemNo').textContent=temp[0].textContent;
      document.querySelector('#itemName').textContent=temp[1].textContent;
      document.querySelector('#itemDesc').textContent=temp[2].textContent;
      document.querySelector('#itemPrice').textContent=temp[4].textContent;

      document.querySelector('#uitemName').value=temp[1].textContent
      document.querySelector('#uitemType').value=hide;
      document.querySelector('#uitemPrice').value=stk[1];
      


  })


})



const amountFeild=document.querySelector('#newStock');
const orderBtn= document.querySelector('#orderBtn');
if(amountFeild===null || orderBtn===null) return;

if(Number(amountFeild.value)>amt){ 
document.querySelector('#orderBtn').setAttribute('disabled',true);
document.querySelector('.amountErr').textContent='Ran out of Stock';
}

 if(amountFeild.value<=0){
    console.log("out of stock");
    orderBtn.setAttribute('disabled',true)
    document.querySelector('.amountErr').textContent='Please Order an Amount';
  }

amountFeild.addEventListener('click',(e)=>{
  console.log(amountFeild.value);
  if(Number(amountFeild.value)>amt){
      console.log("out of stock");
      orderBtn.setAttribute('disabled',true)
      document.querySelector('.amountErr').textContent='Ran out of Stock';
  }

  else if(amountFeild.value<=0){
    console.log("out of stock");
    orderBtn.setAttribute('disabled',true)
    document.querySelector('.amountErr').textContent='Please Order an Amount';
  }

  else{
       orderBtn.disabled=false;
      document.querySelector('.amountErr').textContent='';
  }

})

amountFeild.addEventListener('blur',(e)=>{
  console.log(amountFeild.value);
  if(Number(amountFeild.value)>amt){
      console.log("out of stock");
      document.querySelector('#orderBtn').setAttribute('disabled',true)
  }
  else{
      document.querySelector('#orderBtn').disabled=false;
      document.querySelector('.amountErr').textContent='';
  }

})

}


//paying here
function paying(){
    const payNow=document.querySelectorAll('#payNow');
    if(payNow===null) return;

     payNow.forEach(pay=>{
        pay.addEventListener('click',(e)=>{
            let temp =e.target.parentElement.parentElement;
            
            let children= temp.children;
            
            
            document.querySelector('.itmName').textContent=children[0].textContent;
            document.querySelector('.itmAmt').textContent=children[2].textContent;
            document.querySelector('.itmPrice').textContent=children[3].textContent;
            document.querySelector('#oid').value=children[1].value;
            
            let price=(children[3].textContent).split(":");
            console.log(price);
            document.querySelector('#amtPay').value=textContent=Number(price[1]);
    
        })
        
    })
    
    
    //buying validations
    const sk=document.querySelector('#ssk');
    const accNo=document.querySelector('#cardNo');
    const accHolder=document.querySelector('#cardName');
    const errors=document.querySelectorAll('.err');
    if(sk===null || accNo===null || accHolder===null || errors===null)return;
    let regex=/^([A-Za-z]+\s)*([A-Za-z]+)$/;
    if(!regex.test(accHolder.value)){
        errors[0].textContent='Name must Have only Letters';
        document.querySelector('#buyNow').setAttribute('disabled',true)
        console.log('reg');
    }
    
    accHolder.addEventListener('blur',()=>{

        console.log('blur');
       
    
        if(accHolder.value===''){
            errors[0].textContent='Field Required';
            document.querySelector('#buyNow').setAttribute('disabled',true)
        }
        else{
            errors[0].textContent='';
            document.querySelector('#buyNow').disabled=false;
    
        }
        if(!regex.test(accHolder.value)){
            errors[0].textContent='Name must Have only Letters';
            document.querySelector('#buyNow').setAttribute('disabled',true)
            console.log('reg');
        }
    })
    accNo.addEventListener('blur',()=>{
        
        if(accNo.value.length===8){
            errors[1].textContent='';
            document.querySelector('#buyNow').disabled=false;
    
        }
        else{
            errors[1].textContent='Must have 8 characters only';
            document.querySelector('#buyNow').setAttribute('disabled',true)
        }
    
        if(accNo.value===''){
            errors[1].textContent='Feild Required';
            document.querySelector('#buyNow').setAttribute('disabled',true)
        }

        if(!regex.test(accHolder.value)){
            errors[0].textContent='Name must Have only Letters';
            document.querySelector('#buyNow').setAttribute('disabled',true)
            console.log('reg');
        }
    })
    sk.addEventListener('blur',()=>{
     
    
    
        if(sk.value.length===3){
            errors[2].textContent='';
            document.querySelector('#buyNow').disabled=false;
            
        }
        else{
            errors[2].textContent='Must have 3 characters only';
            document.querySelector('#buyNow').setAttribute('disabled',true)
        }
    
        if(sk.value===''){
            errors[2].textContent='Enter Only Numbers';
            document.querySelector('#buyNow').setAttribute('disabled',true)
        }


        if(!regex.test(accHolder.value)){
            errors[0].textContent='Name must Have only Letters';
            document.querySelector('#buyNow').setAttribute('disabled',true)
            console.log('reg');
        }
    })
    
    //cancel order functionality
    const cancelBtn = document.querySelectorAll('#cancelOrderBtn');
    cancelBtn.forEach(btn=>{
       
        btn.addEventListener('click',(e)=>{
    
            let temp =e.target.parentElement.parentElement;
            
            let children= temp.children;
        
            document.querySelector('#quantity').value=Number(children[3].textContent);
            document.querySelector('#itmName').value=children[1].textContent;
            document.querySelector('#coid').value=children[2].value;
            
        })
    
       
    })
    
    
}

//final order 
function finalize(){

    const completeBtns= document.querySelectorAll('#completeBtn');
    if(completeBtns===null) return;
    completeBtns.forEach(completeBtn=>{
        completeBtn.addEventListener('click',(e)=>{
    
            let temp =e.target.parentElement.parentElement;            
            let children= temp.children;
            console.log(children);
            document.querySelector('#oderidDriver').value=children[0].textContent;
            console.log(document.querySelector('#oderidDriver').value);
        })
    })
    
}