import React, { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';

import axios from 'axios';


function Produits() {

  const [liste, setListe] = useState([])

  const navigate = useNavigate();

  const { id } = useParams();

  const handleClick = (produit) => {

    navigate("/details/" + produit.id, { replace: true });
  }

  useEffect(()=>{
    axios("https://127.0.0.1:8000/api/produits?scats.id=" + id,{
      headers: {
        Accept: "application/json"
      }
    })
    .then((reponse)=>{
      setListe(reponse.data);
    })
  }, [])

  return (
    <>

      <div className='row'>
        
        {
          liste.map((produit, index) => (
            <div key={index} onClick={() => { handleClick(produit)}} className="clickable col-12 mb-3">
              
                <div className="card">
                    <img src={produit.image} className="card-img-top" alt="..." style={ {height: "50px"}}/>
                    <div className="card-body">
                        <h5 className="card-title">{produit.libelle}</h5>
                    </div>
                </div>            
              
            
        </div>
          ))
        }
      </div>
    </>
    );
}

export default Produits;