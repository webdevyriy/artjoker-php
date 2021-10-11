let origBoard;
const humanPlayer = '<i class="fa fa-close play one"></i>';
const aiPlayer = '<i class="fa fa-circle-o play two"></i>';
const winsText =  document.querySelector('.game-result__wins span');
const loseText =  document.querySelector('.game-result__lose span');
const winCombos = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [6, 4, 2]
]

const squares = document.querySelectorAll('.game-col');

startGame();

function startGame() {
    document.querySelector(".msg-page").style.display = "none";
    origBoard = Array.from(Array(9).keys());
    for (let i = 0; i < squares.length; i++) {
        squares[i].innerText = '';
        squares[i].style.removeProperty('background-color');
        squares[i].addEventListener('click', turnClick, false);
    }
}

function turnClick(square) {
    if (typeof origBoard[square.target.id] == 'number') {
        turn(square.target.id, humanPlayer)
        if (!checkWin(origBoard, humanPlayer) && !checkTie()) turn(bestSpot(), aiPlayer);
    }
}

function turn(squareId, player) {
    origBoard[squareId] = player;
    document.getElementById(squareId).innerHTML = player;
    let gameWon = checkWin(origBoard, player)
    if (gameWon) gameOver(gameWon)
}

function checkWin(board, player) {
    let plays = board.reduce((a, e, i) =>
        (e === player) ? a.concat(i) : a, []);
    let gameWon = null;
    for (let [index, win] of winCombos.entries()) {
        if (win.every(elem => plays.indexOf(elem) > -1)) {
            gameWon = {index: index, player: player};
            break;
        }
    }

    return gameWon;
}

function gameOver(gameWon) {
    for (let index of winCombos[gameWon.index]) {
        document.getElementById(index).style.backgroundColor =
            gameWon.player == humanPlayer ? "#d7f5d7" : "#ffd2e1";
    }
    for (let i = 0; i < squares.length; i++) {
        squares[i].removeEventListener('click', turnClick, false);
    }
    declareWinner(gameWon.player == humanPlayer ? "<p>Вы выиграли </p>" : "<p>Вы проиграли</p>");

    const url = window.location.origin + '/result';

    if (gameWon.player == humanPlayer) {
        postData(url, {result: 'wins'})
            .then((data) => {
                winsText.textContent =  data.wins;
            });
    } else {
        postData(url, {result: 'lose'})
            .then((data) => {
                loseText.textContent =  data.lose;
            });
    }

}

async function postData(url = '', data) {
    const response = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(data)
    });
    return await response.json();
}


function declareWinner(who) {
    document.querySelector(".msg-page").style.display = "block";
    document.querySelector(".msg-p").innerHTML = who;
}

function emptySquares() {
    return origBoard.filter(s => typeof s == 'number');
}

function bestSpot() {
    return minimax(origBoard, aiPlayer).index;
}

function checkTie() {
    if (emptySquares().length == 0) {
        for (let i = 0; i < squares.length; i++) {
            squares[i].style.backgroundColor = "d7f5d7";
            squares[i].removeEventListener('click', turnClick, false);
        }
        declareWinner("<p>Ничья</p>")
        return true;
    }
    return false;
}

function minimax(newBoard, player) {
    let availSpots = emptySquares();

    if (checkWin(newBoard, humanPlayer)) {
        return {score: -10};
    } else if (checkWin(newBoard, aiPlayer)) {
        return {score: 10};
    } else if (availSpots.length === 0) {
        return {score: 0};
    }
    let moves = [];
    for (let i = 0; i < availSpots.length; i++) {
        let move = {};
        move.index = newBoard[availSpots[i]];
        newBoard[availSpots[i]] = player;

        if (player == aiPlayer) {
            let result = minimax(newBoard, humanPlayer);
            move.score = result.score;
        } else {
            let result = minimax(newBoard, aiPlayer);
            move.score = result.score;
        }

        newBoard[availSpots[i]] = move.index;

        moves.push(move);
    }

    let bestMove;
    if(player === aiPlayer) {
        let bestScore = -10000;
        for(let i = 0; i < moves.length; i++) {
            if (moves[i].score > bestScore) {
                bestScore = moves[i].score;
                bestMove = i;
            }
        }
    } else {
        let bestScore = 10000;
        for(let i = 0; i < moves.length; i++) {
            if (moves[i].score < bestScore) {
                bestScore = moves[i].score;
                bestMove = i;
            }
        }
    }

    return moves[bestMove];
}
