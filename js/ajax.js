
function HomePage(){
   
    window.addEventListener('DOMContentLoaded',()=>{
        const typeBtns = document.querySelectorAll('#type');
        const url = new URLSearchParams();
     
        url.append('done',1);
        let newArray
        document.querySelector('.category__text').textContent=`Type : ${typeBtns[0].textContent}`
    
    
        for(const data  of typeBtns){
            url.append('type',typeBtns[0].name)
            console.log('type',typeBtns[0].name);
        }
    
    
          fetch('mvc/model.php',{
            method:'post',
            body:url
        }).then(result=>result.text()).then(res=>{
            resArray=res.split('*');
            console.log(resArray.length);
            let length=(resArray.length/5)-1
            for(let i =0; i<length; i++){
             newArray=resArray.splice(0,6);
     
    
            if(!(document.querySelector('#one').classList.contains('done'))){
    
                  
                
             document.querySelector('#one').innerHTML+=
             `
                <div class='items d-flex flex-column flex-grow-1 card ms-lg-2 mx-auto  py-3 px-2'  id='usersCard'>
                <img src=${newArray[0]} class='card-img-top img-fluid' >
                <div class="card-body text-center">
                <input type='hidden' name='types' id='hideTypes' value=${newArray[1]} >
                <h5 class='card-title mb-auto fw-bold' >${newArray[2]} </h5>
                <p class='card-text mt-auto' >${newArray[3]} </p>
                <p class='card-details text-secondary mt-auto'>
                Avialble in Stock - ${newArray[4]} 
                </p>
            
                <h3 ><span>Price $:</span>${newArray[5]} </h3>
                <a href="login.php" style="min-width:200px"  class="btn btn-primary mt-auto  text-light d-block w-100  mt-3">Buy Now</a>
            
            </div>
            </div>
                `
    
            }
    
            }
            document.querySelector('#one').classList.add('done');
        
          
        }).catch(err=>{
            console.log(err);
        })
       
    
    })
    const typeBtns = document.querySelectorAll('#type');
    let moveButtons=[];
    let clicked;
    let clickedButton;
    
    typeBtns.forEach((typeBtn,index)=>{
         
        
        typeBtn.addEventListener('click',(e)=>{
            e.preventDefault();
    
            const url = new URLSearchParams();
            url.append('done',1);
            let newArray
            document.querySelector('.category__text').textContent=`Type : ${typeBtn.textContent}`
    
    
                      
            for(const data  of typeBtns){
                url.append('type',typeBtn.name)
    
            }
            // sendin data using fetch
            fetch('mvc/model.php',{
                method:'post',
                body:url
            }).then(result=>result.text()).then(res=>{
                resArray=res.split('*');
                
                //creatiting array of data to pass
                let length=(resArray.length/5)-1
                for(let i =0; i<length; i++){
                 newArray=resArray.splice(0,6);
    
                if(!moveButtons.includes(typeBtn.name)){
                    document.querySelector('#one').innerHTML='';
                    document.querySelector('#one').classList.remove('done');
                    moveButtons=[];
                   
                }
    
                if(!(document.querySelector('#one').classList.contains('done'))){
                 moveButtons.push(typeBtn.name)
            
                    
                 document.querySelector('#one').innerHTML+=
                 `
                 <div class='items d-flex flex-column flex-grow-1 card ms-lg-2 mx-auto  py-3 px-2'  id='usersCard'>
                 <img src=${newArray[0]} class='card-img-top img-fluid' >
                 <div class="card-body text-center">
                 <input type='hidden' name='types' id='hideTypes' value=${newArray[1]} >
                 <h5 class='card-title mb-auto fw-bold' >${newArray[2]} </h5>
                 <p class='card-text mt-auto' >${newArray[3]} </p>
                 <p class='card-details text-secondary mt-auto'>
                 Avialble in Stock - ${newArray[4]} 
                 </p>
             
                 <h3 ><span>Price $:</span>${newArray[5]} </h3>
                 <a href="login.php" style="min-width:200px"  class="btn btn-primary mt-auto  text-light d-block w-100  mt-3">Buy Now</a>
                  
             
                </div>
                 </div>
                 `
    
                }
   
                }
                document.querySelector('#one').classList.add('done');
            
                console.log(moveButtons);         
            }).catch(err=>{
                console.log(err);
            })
        })
        
    })
}

HomePage();

