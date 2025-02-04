/*
 * rps.js: January 2017
 * student name: Che-Wei Liu
 */

// DON'T TOUCH, Just Read  --------------
// array of moves/ids
var pics = ["rock", "paper", "scissors"];

const getComputerMove = () => {
  let random = Math.floor(Math.random() * 3);
  document
    .getElementById("comp-img")
    .setAttribute("src", "images/" + pics[random] + ".jpg");
  return random;
};

const move = () => {
  let compmove = getComputerMove();
  pics.map((pictureid, index) => {
      ///if selcted if match the picure,highlight border and calculate win
    if (pictureid === event.target.id) {
      document
        .getElementById(pictureid)
        .setAttribute("class", "rps-img img-border");
      let pResult;
      let cResult;
      if (index === 0) {
          /// if user win, user gain point pResult
          /// if computer win, computer gain point cResult
        pResult = compmove === 2 ? 1 : 0;
        cResult = compmove === 1 ? 1 : 0;
      }
      if (index === 1) {
        pResult = compmove === 0 ? 1 : 0;
        cResult = compmove === 2 ? 1 : 0;
      }
      if (index === 2) {
        pResult = compmove === 1 ? 1 : 0;
        cResult = compmove === 0 ? 1 : 0;
      }

      document.getElementById("output").innerHTML =
      ///if user win, display index 0, if computer win, display index 1, if neither, display index2;
        pResult === 1 ? results[0] : cResult === 1 ? results[1] : results[2];

      pResult === 1
      ///update points for user only if user win
        ? (document.getElementById("user-score").innerHTML = ++playerScore)
        : cResult === 1
        ///update points for computer if computer win
        ? (document.getElementById("comp-score").innerHTML = ++compScore)
        : null;

    } else {
        ///if not match, return the highlighted border from last round back to no highlight
      document
        .getElementById(pictureid)
        .setAttribute("class", "rps-img no-img-border");
    }
  });
};

// load the page elements
const init = () => {
  // total 3 variable declared- newNode,imageContainer,scoreBoard;
  let newNode;
  ///loading image container
  let imgContainer = document.getElementById("img-container");
  pics.map((pictureid) => {
    newNode = document.createElement("img");
    newNode.setAttribute("src", "images/" + pictureid + ".jpg");
    newNode.setAttribute("id", pictureid);
    newNode.setAttribute("class", "rps-img no-img-border");
    newNode.id = pictureid;
    imgContainer.appendChild(newNode);
    newNode.addEventListener("click", move);
  });

  // top game-header div
  newNode = document.createElement("div");
  newNode.setAttribute("class", "game-header");
  newNode.appendChild(
    document.createTextNode("Choose Your Method of Destruction:")
  );
  document.body.insertBefore(newNode, imgContainer);
  // the h1 header
  newNode = document.createElement("header");
  document.body.insertBefore(newNode, document.body.firstElementChild);
  newNode = document.createElement("h1");
  newNode.appendChild(document.createTextNode("Play Rock, Paper, Scissors!"));
  document.getElementsByTagName("header")[0].appendChild(newNode);

  //-----
  //score
  scoreBoard = document.createElement("div");
  scoreBoard.setAttribute("id", "score");
  document.body.appendChild(scoreBoard);
  ///scorediv
  newNode = document.createElement("div");
  newNode.appendChild(document.createTextNode("Score:"));
  scoreBoard.appendChild(newNode);
  //you div
  newNode = document.createElement("div");
  newNode.appendChild(document.createTextNode("You: "));
  scoreBoard.appendChild(newNode);
  /// user-score span;
  newNode = document.createElement("span");
  newNode.setAttribute("id", "user-score");
  scoreBoard.lastElementChild.appendChild(newNode);
  //computer div
  newNode = document.createElement("div");
  newNode.appendChild(document.createTextNode("Computer: "));
  scoreBoard.appendChild(newNode);
  //comp-score span;
  newNode = document.createElement("span");
  newNode.setAttribute("id", "comp-score");
  scoreBoard.lastElementChild.appendChild(newNode);
  //top game-header div
  newNode = document.createElement("div");
  newNode.setAttribute("class", "game-header");
  newNode.appendChild(document.createTextNode("The Computer Chooses:"));
  document.body.insertBefore(newNode, document.body.lastElementChild);
  /// table--
  newNode = document.createElement("table");
  document.body.insertBefore(newNode, document.body.lastElementChild);
  //tr
  newNode = document.createElement("tr");
  document.getElementsByTagName("table")[0].appendChild(newNode);
  //first td
  newNode = document.createElement("td");
  document.getElementsByTagName("tr")[0].appendChild(newNode);
  newNode = document.createElement("img");
  newNode.setAttribute("class", "rpg-img");
  newNode.setAttribute("id", "comp-img");
  document.getElementsByTagName("td")[0].appendChild(newNode);
  //second td;
  newNode = document.createElement("td");
  newNode.setAttribute("class", "vert-center");
  document.getElementsByTagName("tr")[0].appendChild(newNode);
  newNode = document.createElement("div");
  newNode.setAttribute("id", "output");
  document.getElementsByTagName("td")[1].append(newNode);
  //footer;
  newNode = document.createElement("footer");
  newNode.appendChild(
    document.createTextNode("Copyright © 2017 Wendi Jollymore")
  );
  document.body.insertBefore(
    newNode,
    document.body.lastElementChild.nextSibling
  );

};

document.addEventListener("DOMContentLoaded", init, false);
var results = ["You Win!", "You Lose!", "It's a Tie!"];
var compScore = 0;
var playerScore = 0;
