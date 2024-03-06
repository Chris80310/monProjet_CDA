import React from 'react'
import ReactDOM from 'react-dom/client'
// import MonPremierComposant from "./jsx/MonPremierComposant";
import Cat from "./jsx/Cat";

//ReactDOM.createRoot(document.getElementById('react-app')).render(
ReactDOM.createRoot(document.getElementById('app_react_cat')).render(
    <React.StrictMode>
        {/* <MonPremierComposant /> */}
        <Cat />
    </React.StrictMode>,
)
