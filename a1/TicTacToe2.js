/*
 * Tic Tac Toe scripts, January 2017
 * Version 2
 * Che-Wei Liu
 */

// TODO document this
// get a list of HTML elements with "td" tag and assign it to variable "board"
var board = document.getElementsByTagName("td");

// assuming we index the 9 tic tac toe cells from left to right, top to
// bottom, as 0-8, these would be all of the winning combinations:
var winSets = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [2, 4, 6],
];

// X always gets to go first
///making starting player random
//var player = "X";
var player = Math.random() >= 0.5 ? "X" : "O";
document.getElementById("player").innerHTML = player;
// keep track of how many cells are empty at any time
var empty = 9;

// keep track of game status - false if still playing
var gameOver = false;

var previousClick = null;
/* Function resetGame() is called when user clicks on the "game reset" button
 1. sets content of all 9 cells to nothing
 2. sets the starting player (this version, X always starts the game)
 3. updates the message to the current player
 4. resets the number of empty cells to 9
 5. sets the game over flag to false to indicate that the game is in progress
 */
function resetGame() {
  // TODO: document this code from class
  // assign all the innterHTML OF the td tag to be empty string ""
  for (i = 0; i < board.length; i++) {
    board[i].innerHTML = "";
    ///reset backgroundColour of the last clicked element
    board[i].style.backgroundColor = "FFFFFF";
  }

  // TODO reset player back to X and update it on the page
  //player = "X";
  player = Math.random() >= 0.5 ? "X" : "O";
  document.getElementById("player").innerHTML = player;

  // TODO reset gameOver and # of empty cells
  gameOver = false;
  empty = 9;
}

/* Function cellClicked() is called
 when the event listeners for the "td" cells fire which occurs
 when the user clicks on one of the nine cells of the board
 1. decreases # of empty cells by 1
 2. sets the content of the clicked cell to the current player's mark
 3. checks whether or not there is a winner
 4. flips (changes) the current player
 5. updates the message to the current player
 */
function cellClicked(cell) {
  /// if there was a previous clicked element, set its background back to white
  if (previousClick) {
    previousClick.style.backgroundColor = "#FFFFFF";
  }
  ///previousClick.innerHTML.style.backgroundColor = "#FFFFFF";

  //TODO: 1-5 should occur only when the selected cell is empty and the game is
  // still in progress!
  if (cell.innerHTML === "" && !gameOver) {
    // TODO: decrease # of empty cells by 1
    empty--;

    // TODO: document this code from class
    //the value of clicked cell become player (either "O" or "X" depends on player)
    cell.innerHTML = player;
    checkWin();
    /// only switch player when game is not over;
    if (!gameOver) {
      player = player === "X" ? "O" : "X";
      document.getElementById("player").innerHTML = player;
    }

    cell.style.backgroundColor = "#F0F0F0";
    console.log(cell);
    previousClick = cell;
  }
}

/* Function checkWin() is called to check all winning combinations and display results
 */
function checkWin() {
  // TODO: document all of the code from class
  // run through all the winning conditions,
  // if the board of all 3 indexes is equal to one another and it is not empty ( so either all "O" or all "X"),
  //declare winner
  for (i = 0; i < winSets.length; i++) {
    if (
      board[winSets[i][0]].innerHTML == board[winSets[i][1]].innerHTML &&
      board[winSets[i][1]].innerHTML == board[winSets[i][2]].innerHTML &&
      board[winSets[i][0]].innerHTML != ""
    ) {
      ///change colour of winning combination to light blue when condition met
      board[winSets[i][0]].style.color = "blue";
      board[winSets[i][1]].style.color = "blue";
      board[winSets[i][2]].style.color = "blue";

      // TODO: replace console.log("We have a winner!") with:
      //console.log("We have a winner!");
      //  - set gameOver variable: game is now over
      //set the innerHTML of the first children of message div (p) to be "game is now over", set gameOver to be true;
      document.getElementById("message").children[0].innerHTML =
        "game is now over";
      gameOver = true;
      //  - display "X Wins!" or "O Wins!" in the winner H3
      document.getElementById("winner").innerHTML = player + " Wins!";
      //  - call displayWin(true) function
      displayWin(true);
      //  - break out of this loop: no point in continuing
      break;
    }
  }

  // TODO: if there are no empty cells left and game is not yet over,
  //       it means that there is no winner for this game
  if (empty == 0 && !gameOver) {
    // - set gameOver variable: game is now over
    gameOver = true;
    document.getElementById("message").children[0].innerHTML =
      "game is now over";
    // - display "No one wins! :(" in the winner H3
    document.getElementById("winner").innerHTML = "No one wins! :(";
    // - call displayWin(true) function
    displayWin(true);
  }
}

/* Enhancements you can try:
- highlight (change background colour) of the cell that was just clicked to indicate that it was the last move; make sure it goes back to the regular background when the next user clicks
- make the starting player random
- keep track of statistics (how many times each player wins)
- hide the "Player X Go!" on startup; show it only while game is playing
- when a winner is determined, the player information still swaps: would be nice if it didn't (I would
automatically hide those things before the game starts and when it ends (Week 3))
- change the font colour of the winning combination (don't forget to change it back when the game is reset)
*/

// ==========================================================================
// DON'T TOUCH THESE LINES OF CODE  (we'll learn this stuff in a later lesson)
document.getElementById("reset").addEventListener("click", resetGame);
document.getElementById("message").addEventListener("click", function () {
  displayWin(false);
});
for (i = 0; i < board.length; i++) {
  document.getElementsByTagName("td")[i].addEventListener("click", function () {
    cellClicked(this);
  });
}
// displays the results window with the winner inside it: the method will
// either show the results or hide them (displayWin(true) shows and
// displayWin(false) hides)
function displayWin(show) {
  if (show) {
    document.getElementById("message").style.display = "block";
    document.getElementById("overlay").style.display = "block";
  } else {
    document.getElementById("message").style.display = "none";
    document.getElementById("overlay").style.display = "none";
  }
}

// ===============================================================
