import './GameOver.css'

import { useContext } from 'react';
import { QuizContext } from '../context/quiz';

import WellDone from '../img/welldone.svg'

import React from 'react';

const GameOver = () => {
    const [quizState, dispatch] = useContext(QuizContext)

    return (
        <div className='game-over'>
            <h2>Fim de Jogo!</h2>
            <p>Pontuação: {quizState.score}</p>
            <p>Você acertou {quizState.score} de {quizState.questions.length} questões.</p>
            <img src={WellDone} alt="Fim do Quiz" />
            <button onClick={() => dispatch ({ type: "NEW_GAME"})}>Reiniciar</button>
        </div>
    );
};

export default GameOver;