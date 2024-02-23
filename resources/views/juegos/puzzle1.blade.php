
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  width: 100vw;
  min-height: 100vh;
  font-family: Arial;
  /* background: #95377f; */
  /* background: linear-gradient(to bottom right, #e53935, #5e35b1); */
  text-align: center;
}


.puzzle {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 302px;
  min-height: 302px;
  box-shadow: 0 0 2px 2px rgba(256,256,256,0.3);
  border: solid 1px black;
  margin: auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;

  .items {
    display: inline;
    float: left;
    line-height: 100px;
    text-align: center;
    width: 100px;
    height: 100px;
    border: solid 1px black;
    cursor: pointer;
    color: rgba(0,0,0,0);

    background: url({{$imagen}});
    background-size: 300%;
  }
  .item {
    background-image: none;
    background-position: bottom right;
  }
  .item1 {
    background-position: top left;
  }
  .item2 {
    background-position: top;
  }
  .item3 {
    background-position: top right;
  }
  .item4 {
    background-position: center left;
  }
  .item5 {
    background-position: center;
  }
  .item6 {
    background-position: center right;
  }
  .item7 {
    background-position: bottom left;
  }
  .item8 {
    background-position: bottom;
  }
}

.modal {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0,0,0,0.4);
  display: flex;
  justify-content: center;
  align-items: center;
  .modal__box {
    padding: 40px 60px;
    background: white;
    border-radius: 2px;
    .modal__button {
      color: #95377f;
      border: solid 1px #95377f;
      border-radius: 2px;
      padding: 10px 20px;
      display: inline-block;
      letter-spacing: 2px;
      cursor: pointer;
      &:hover {
        color: white;
        background: #95377f;
      }
    }
  }
}


.hidden {
  display: none;
}

</style>
<h1>ROMPECABEZAS 1</h1>
<p>Armalo y obtendras 10 Puntos</p>
<section class="puzzle"></section>

<div class="modal">
  <div class="modal__box">
    <div class="modal__button">INICIAR</div>
  </div>
</div>

<script>
var modal = document.querySelector(".modal");
var button = document.querySelector(".modal__button");
var puzzleBox = document.querySelector(".puzzle");
var puzzleItems = document.getElementsByClassName("items");

button.addEventListener("click", init);

// random values in boxes; insert values and add classnames
function init() {
  modal.classList.add("hidden");
  var puzzleValues = [1, 2, 3, 4, 5, 6, 7, 8, ""];
  puzzleBox.innerHTML = "";
  for (let i=0; i<9; i++) {
    var newDiv = document.createElement("div");
    let numb = random(puzzleValues);
    newDiv.innerHTML = numb;
    // newDiv.innerHTML = i ? i : "";
    newDiv.classList.add("items", "item"+numb);
    // newDiv.classList.add("items", "item"+(i ? i : ""));
    puzzleBox.appendChild(newDiv);
  }
  puzzleBox.addEventListener("click", move)
}

// on every move, check if the game is won
function check() {
  let checkArr = [];
  for (let i=0; i<9; i++) {
    if (puzzleItems[i].classList.contains("item"+(i+1))) {
      checkArr.push(i+1);
    }
  }
  if (checkArr.length === 8) {
    alert("gano 10 puntos");
    document.querySelector('.item').style.backgroundImage = "url({{$imagen}})";
    setTimeout(function() {
      button.innerHTML = "Has Ganado 10 Puntos!";
      modal.classList.remove("hidden");
      setTimeout(function() {
        button.innerHTML = "Ganar mas Puntos";
      }, 800);
    }, 800);
  }
}

// takes random element af an array and deletes it
function random(arr) {
  let rand = Math.floor(Math.random() * arr.length);
  let toReturn = arr[rand];
  arr.splice(rand, 1);
  return toReturn;
}

function swapElts(i, j, swap) {
  // p.before(span) -> <span></span><p></p>
  // p.after(span) -> <p></p><span></span>
  if (!swap) puzzleItems[j].before(puzzleItems[i]); // i,j
  else {
    puzzleItems[j].after(puzzleItems[i]); // j,i
    puzzleItems[i].before(puzzleItems[j-1]); // (j-1),i
  }
}

// on click, move this box to the 'empty' box
function move(e) {
  if (Array.from(puzzleItems).indexOf(e.target) === 0) {
    if (puzzleItems[1].classList.contains("item")) swapElts(1, 0);
    if (puzzleItems[3].classList.contains("item")) swapElts(0, 3, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 1) {
    if (puzzleItems[0].classList.contains("item")) swapElts(1, 0);
    if (puzzleItems[2].classList.contains("item")) swapElts(2, 1);
    if (puzzleItems[4].classList.contains("item")) swapElts(1, 4, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 2) {
    if (puzzleItems[1].classList.contains("item")) swapElts(2, 1);
    if (puzzleItems[5].classList.contains("item")) swapElts(2, 5, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 3) {
    if (puzzleItems[4].classList.contains("item")) swapElts(4, 3);
    if (puzzleItems[0].classList.contains("item")) swapElts(0, 3, true);
    if (puzzleItems[6].classList.contains("item")) swapElts(3, 6, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 4) {
    if (puzzleItems[3].classList.contains("item")) swapElts(4, 3);
    if (puzzleItems[5].classList.contains("item")) swapElts(5, 4);
    if (puzzleItems[1].classList.contains("item")) swapElts(1, 4, true);
    if (puzzleItems[7].classList.contains("item")) swapElts(4, 7, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 5) {
    if (puzzleItems[4].classList.contains("item")) swapElts(5, 4);
    if (puzzleItems[2].classList.contains("item")) swapElts(2, 5, true);
    if (puzzleItems[8].classList.contains("item")) swapElts(5, 8, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 6) {
    if (puzzleItems[7].classList.contains("item")) swapElts(7, 6);
    if (puzzleItems[3].classList.contains("item")) swapElts(3, 6, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 7) {
    if (puzzleItems[6].classList.contains("item")) swapElts(7, 6);
    if (puzzleItems[8].classList.contains("item")) swapElts(8, 7);
    if (puzzleItems[4].classList.contains("item")) swapElts(4, 7, true);
  }
  else if (Array.from(puzzleItems).indexOf(e.target) === 8) {
    if (puzzleItems[7].classList.contains("item")) swapElts(8, 7);
    if (puzzleItems[5].classList.contains("item")) swapElts(5, 8, true);
  }
  check();
}
</script>
