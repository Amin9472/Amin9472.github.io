let cards = document.querySelectorAll(".card");
for (let i = 1; i < cards.length; i++) {
  cards[i].style.display = "none";
}
let array_btn_next = document.querySelectorAll("#next");
let array_btn_previous = document.querySelectorAll("#previous");

array_btn_next.forEach((element) => {
  element.addEventListener("click", function (event) {
    for (let j = 0; j < cards.length; j++) {
      if (cards[j].style.display == "block") {
        cards[j].style.display == "none";
        if(j!=15){
          cards[j + 1].style.display == "block";
        }
        else{
          cards[15].style.display == "block";
          
        }
      }
    }
    let temp = event.target.parentNode.parentNode.id;
    let check = event.target.parentNode.querySelectorAll(
      'input[type="radio"]:checked'
    );
    if (check.length == 1) {
      if (temp == 16) {
        event.target.nextElementSibling.style.display = "block";
        event.target.style.display = "none";
      } else {
        event.target.parentNode.parentNode.style.display = "none";
        temp = parseInt(temp) + 1;
        let final = String(temp);
        document.getElementById(final).style.display = "block";
      }
    } else {
      event.target.parentNode.children[0].innerText = "Please choose an option";
    }
  });
});

array_btn_previous.forEach((element1) => {
  element1.addEventListener("click", function (event) {
    let temp = event.target.parentNode.parentNode.id;
    if (temp == 1) {
      event.target.style.display = "none";
    } else {
      event.target.parentNode.parentNode.style.display = "none";
      temp = parseInt(temp) - 1;
      let final = String(temp);
      document.getElementById(final).style.display = "block";
    }
  });

});
array_btn_previous[0].style.display="none"
