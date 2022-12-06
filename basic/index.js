var text = document.querySelector(".text") ;
text.style.color = "red" ;
//text.remove(".text") ;
text.innerHTML = "I am from js ";
try {
 const myfunc = (() => {
console.warn("I am from js try catch ") ;
 }) 
 myfunc() ;
} catch (error) {
    console.log(error) ;
}
//
setTimeout(() => {
    console.log("byby") ;
} , 2000 )
set