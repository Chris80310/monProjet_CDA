import React from 'react';
import App from './jsx/App';

import ReactDOM from 'react-dom/client';
// import './index.css';
import { BrowserRouter } from 'react-router-dom';
// import MonPremierComposant from "./jsx/MonPremierComposant";
// import Cat from "./jsx/Cat";


ReactDOM.createRoot(document.getElementById('app_react')).render(
    <React.StrictMode>
        <BrowserRouter>
            {/* <MonPremierComposant /> */}
            <App />
            {/* <Cat /> */}
        </BrowserRouter>
    </React.StrictMode>,
)
