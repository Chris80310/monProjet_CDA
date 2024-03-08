import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

import axios from 'axios';


function DetailsProd() {

  const [produit, setProduit] = useState({ libelle:"", img:"", description:""})

  const { id } = useParams();

  const handleClick = (cat) => {

    navigate("/DetailsProd/" + cat.id, { replace: true });
  }

  useEffect(()=>{
    axios("https://127.0.0.1:8000/api/produits/" + id,{
      headers: {
        Accept: "application/json"
      }
    })
    .then((reponse)=>{
      setProduit(reponse.data);
    })
  }, [])

  return (
    <>

      <div className='row'>
        
            <div >
              <div className="col-12">
                  <h1>{produit.libelle}</h1>
              </div>

              <img src={produit.img} alt="" className="w-50" />

              <div className="col-12">
                  {produit.description}
              </div>

              <div className="col-12">
                  <a href={'/add/' + produit.id} className="btn btn-primary">Ajouter au panier</a>
              </div>        
              
            </div>
      </div>
    </>
    );
}

export default DetailsProd;