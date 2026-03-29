
    const carousel = document.getElementById("carousel");
    let rotY=0,drag=false,startX;

    document.addEventListener("mousedown",e=>{
      drag=true; startX=e.clientX;
    });
    document.addEventListener("mouseup",()=>drag=false);
    document.addEventListener("mousemove",e=>{
      if(!drag) return;
      rotY+=(e.clientX-startX)*0.4;
      carousel.style.transform=`rotateY(${rotY}deg)`;
      startX=e.clientX;
    });

    function auto(){
      if(!drag){
        rotY+=0.25;
        carousel.style.transform=`rotateY(${rotY}deg)`;
      }
      requestAnimationFrame(auto);
    }
    auto();
