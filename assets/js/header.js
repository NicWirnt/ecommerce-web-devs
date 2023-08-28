
const currentPath = window.location.pathname;

const links = document.querySelectorAll('.nav-menu a');
        links.forEach((link) => {
            if(link.getAttribute('href') === currentPath){
                link.classList.add('active');
            } else{
                link.classList.remove('active');
            }
        })

        const initializeCartState = () => {
            const cartCountElement = document.querySelector("#cart-count");
            const cartData = JSON.parse(localStorage.getItem("cart")) || [];
            let cartCount = 0
            if(cartData !== null){
                cartCount = cartData.length;
            } else {
                cartCount = 0;
            }
            console.log(cartData);
            cartCountElement.textContent = cartCount;
        }
        
        document.addEventListener("DOMContentLoaded", initializeCartState);