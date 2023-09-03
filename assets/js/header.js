const currentPath = window.location.pathname;

const links = document.querySelectorAll('.nav-menu a');
        links.forEach((link) => {
            if(link.getAttribute('href') === currentPath){
                link.classList.add('active');
            } else{
                link.classList.remove('active');
            }
        });

const messageElement = document.querySelector('.message');

setTimeout(()=>{
    messageElement.style.display = 'none';
},3000);

const cart = document.querySelector(".cart-wrapper");
document.querySelector("#cart").onclick = () => {
   
    cart.classList.toggle("active");
    console.log(cart);
}

document.querySelector("#back-cart").onclick = () => {
  
    cart.classList.remove("active");
}