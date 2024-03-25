/*----------------------------HEADER--------------------------------- */
const header = document.querySelector("header")
    window.addEventListener("scroll",function(){
        x = window.pageYOffset
        if(x>0){
            header.classList.add("sticky")
        }
        else {
            header.classList.remove("sticky")
        }
    })
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector(".aspect-ratio-169 ")
    const dotItem = document.querySelectorAll(".dot")
    let imgNuber = imgPosition.length
    let index = 0
    //console.log(imgPositon)

    imgPosition.forEach(function(image,index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click",function(){
        slider (index)
        })
    })
    function imgSlide(){
        index++;
        console.log(index)
        if (index >= imgNuber) {index=0}
        slider (index)
        
    }
    function slider (index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotActive = document.querySelector('.active')
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")

    }
    setInterval(imgSlide,5000)
    
// ---------------------------------------------------------------

const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
itemsliderbar.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})

/*------------------product-----------------------------*/
const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")
smallImg.forEach(function(imgItem,x){
    imgItem.addEventListener("click", function(){
        bigImg.src = imgItem.src
    })
})
const baoquan = document.querySelector(".baoquan")
const chitiet = document.querySelector(".chitiet")
if (baoquan){
    baoquan.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block"
    })
}
if (chitiet){
    chitiet.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none"
    })
}
const butTon =document.querySelector(".product-content-right-bottom-top")
if(butTon){
    butTon.addEventListener("click", function(){
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
    })
}

const activeChitiet = document.querySelector(".detail-title");
const activeBaoquan = document.querySelector(".baoquan-title");
const activeThamkhao = document.querySelector(".thamkhao-title");
document.querySelector(".detail-title").style.borderBottom = "3px solid red"
if (activeChitiet){
    activeChitiet.addEventListener("click", function(){
        document.querySelector(".detail-title").style.borderBottom = "3px solid red";
        document.querySelector(".baoquan-title").style.borderBottom = "none";
        document.querySelector(".thamkhao-title").style.borderBottom = "none";
    })
}
if (activeBaoquan){
    activeBaoquan.addEventListener("click", function(){
        document.querySelector(".baoquan-title").style.borderBottom = "3px solid red";
        document.querySelector(".detail-title").style.borderBottom = "none";
        document.querySelector(".thamkhao-title").style.borderBottom = "none";
    })
}
if (activeThamkhao){
    activeThamkhao.addEventListener("click", function(){
        document.querySelector(".baoquan-title").style.borderBottom = "none";
        document.querySelector(".thamkhao-title").style.borderBottom = "3px solid red";
        document.querySelector(".detail-title").style.borderBottom = "none";
    })
}
