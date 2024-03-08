import React from "react";
// import Scat from "./Scat";
// import Produit from "./Produits";
// import DetailsProd from "./DetailsProd";
import Cat from "./Cat";
import {Routes, Route} from 'react-router-dom';

function App() {
    return (
      <>

        <Routes>
          <Route path="cat" element={<Cat />} />
          {/* <Route path="/scat/:id" element={<Scat />} />
          <Route path="/article/:id" element={<Produits />} /> */}
          {/* <Route path="/details" element={<Details />} /> */}
        </Routes>
      </>
      );
  }
  
export default App;