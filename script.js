const starCont = document.getElementsByClassName("star-container");
[...starCont].forEach(element => {
    for (let i = 0; i < 5; i++) {
        const star = document.createElement("span");
          star.className = " fa fa-star checked";
      
          element.appendChild(star);
      }
});