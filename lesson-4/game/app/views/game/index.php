<section class="game-page">
    <div class="container">
        <div class="game-table">
            <h1>Крестики нолики</h1>
            <div class="players-box">
                <div class="player-one">
                    <img class="img-fluid thumbnails"
                         src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-256.png"
                         alt="avatar">
                    <h2 class="player-name"><?= $login ?></h2>
                </div>
                <div class="computer">
                    <h2 class="player-name">Компьютер</h2>
                    <img class="img-fluid thumbnails" src="https://cdn1.iconfinder.com/data/icons/flat-business-icons/128/desktop-256.png" alt="avatar">
                </div>
            </div>

            <div class="game">
                <div class="game-row">
                    <div class="game-col" id="0"></div>
                    <div class="game-col" id="1"></div>
                    <div class="game-col" id="2"></div>
                </div>
                <div class="game-row">
                    <div class="game-col" id="3"></div>
                    <div class="game-col" id="4"></div>
                    <div class="game-col" id="5"></div>
                </div>
                <div class="game-row">
                    <div class="game-col" id="6"></div>
                    <div class="game-col" id="7"></div>
                    <div class="game-col" id="8"></div>
                </div>
            </div>
            <footer>
                <div class="game-result">
                    <div class="game-result__wins game-result__item">Побед
                        <span><?= $history['wins']?></span>
                    </div>
                    <div class="game-result__lose game-result__item">Поражений
                       <span><?= $history['lose']?> </span>
                    </div>
                </div>
                <div class="game-exit">
                    <a href="/logout">Выход</a>
                </div>
            </footer>

            <div class="msg-page">
                <div class="msg">
                    <div class="msg-p"></div>
                    <button class="rest-game" onclick="startGame()">Играть снова</button>
                </div>
            </div>
        </div>
    </div>
</section>