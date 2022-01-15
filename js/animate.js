const left= document.querySelector('.swipe-left');
const right= document.querySelector('.swipe-right');

if(window.scrollY>762){
    left.classList.add('move');
    right.classList.add('move')
}

window.addEventListener('scroll',(e)=>{

    if(scrollY>614){
        left.classList.add('move');
        right.classList.add('move')
    }
})

const loder= document.querySelector('.full');
document.body.style.overflowY='hidden';
setTimeout(()=>{
   loder.style.display='none';
   document.body.style.overflowY='auto';
},1500)