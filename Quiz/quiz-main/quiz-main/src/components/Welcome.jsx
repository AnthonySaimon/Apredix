import './Welcome.css'
import Quiz from "../img/quiz.svg";

import React, { useContext } from 'react';
import { QuizContext } from '../context/quiz';

const Welcome = () => {
    const [quizState, dispatch] = useContext(QuizContext);

    return (
        <div className='welcome'>
            <h2>Seja bem vindo</h2>
            <p>Clique no botão para começar</p>
            <button onClick={() => dispatch({ type: "CHANGE_STATE" })}>Iniciar</button>
            <img src={Quiz} alt='ínicio do quiz' />
        </div>
    )
}

export default Welcome