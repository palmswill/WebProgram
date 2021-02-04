/*
 * rps.js: January 2017
 * student name: Che-Wei Liu
 */

// DON'T TOUCH, Just Read  --------------
// array of moves/ids
var pics = ["rock", "paper", "scissors"];
// load the page elements

const init=()=>{
    
    // total 3 variable declared- newNode,imageContainer,scoreBoard;
    let newNode;
    ///loading image container
    let imgContainer=document.getElementById("img-container");
    pics.map(
        pictureid=>{
            newNode=document.createElement("img");
            newNode.setAttribute("src","images/"+pictureid+".jpg");
            newNode.setAttribute("class","rps-img no-img-border");;
            newNode.id=pictureid
            imgContainer.appendChild(newNode);
        }   
    )
    // top game-header div
    newNode=document.createElement("div");
    newNode.setAttribute("class","game-header");
    newNode.appendChild(document.createTextNode("Choose Your Method of Destruction:"))
    document.body.insertBefore(newNode,imgContainer);
    // the h1 header 
    newNode=document.createElement("header");
    document.body.insertBefore(newNode,document.body.firstElementChild);
    newNode=document.createElement("h1");
    newNode.appendChild(document.createTextNode("Play Rock, Paper, Scissors!"));
    document.getElementsByTagName("header")[0].appendChild(newNode);

    //top game-header div
    newNode=document.createElement("div");
    newNode.setAttribute("class","game-header");
    newNode.appendChild(document.createTextNode("The Computer Chooses:"));
    document.body.insertBefore(newNode,document.body.lastElementChild);
    /// table--
    newNode=document.createElement("table");
    document.body.insertBefore(newNode,document.body.lastElementChild);
    //tr
    newNode=document.createElement("tr");
    document.getElementsByTagName("table")[0].appendChild(newNode);
    //first td
    newNode=document.createElement("td");
    document.getElementsByTagName("tr")[0].appendChild(newNode);
    newNode=document.createElement("img");
    newNode.setAttribute("class","rpg-img");
    newNode.setAttribute("id","comp-img");
    document.getElementsByTagName("td")[0].appendChild(newNode);
    //second td;
    newNode=document.createElement("td");
    newNode.setAttribute("class","vert-center");
    document.getElementsByTagName("tr")[0].appendChild(newNode);
    newNode=document.createElement("div");
    newNode.setAttribute("id","output");
    document.getElementsByTagName("td")[1].append(newNode);
    //-----
    //score
     scoreBoard=document.createElement("div");
     scoreBoard.setAttribute("id","score");
     document.body.insertBefore(scoreBoard,document.body.lastElementChild);
     ///scorediv
     newNode=document.createElement("div");
     newNode.appendChild(document.createTextNode("Score:"));
     scoreBoard.appendChild(newNode);
     //you div
     newNode=document.createElement("div");
     newNode.appendChild(document.createTextNode("You: "));
     scoreBoard.appendChild(newNode);
     /// user-score span;
     newNode=document.createElement("span");
     newNode.setAttribute("id","user-score");
     scoreBoard.lastElementChild.appendChild(newNode);
     //computer div
     newNode=document.createElement("div");
     newNode.appendChild(document.createTextNode("Computer: "))
     scoreBoard.appendChild(newNode);
     //comp-score span;
     newNode=document.createElement("span");
     newNode.setAttribute("id","user-score");
     scoreBoard.lastElementChild.appendChild(newNode);
     //footer;
     newNode=document.createElement("footer");
     newNode.appendChild(document.createTextNode("Copyright © 2017 Wendi Jollymore"));
     document.body.insertBefore(newNode,document.body.lastElementChild.nextSibling);
     



     


     

     


    


    




    


    
    












}

document.addEventListener("DOMContentLoaded", init, false);

