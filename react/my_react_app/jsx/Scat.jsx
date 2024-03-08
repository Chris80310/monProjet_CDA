import React, { useEffect, useState } from 'react';
import { useNavigate, useParams } from 'react-router-dom';

import axios from 'axios';


function Scat() {

  const [liste, setListe] = useState([])

  const navigate = useNavigate();

  const { id } = useParams();

  const handleClick = (cat) => {

    navigate("/produits/" + cat.id, { replace: true });
  }

  useEffect(()=>{
    axios("https://127.0.0.1:8000/api/scats?scat.id=" + id,{
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
          liste.map((scat, index) => (
            <div key={index} onClick={() => { handleClick(scat)}} className="clickable col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
              
                <div className="card">
                    <img src={scat.image} className="card-img-top" alt="..." />
                    <div className="card-body">
                        <h5 className="card-title">{scat.libelle}</h5>
                    </div>
                </div>            
              
            </div>
          ))
        }
      </div>
    </>
    );
}

export default Scat;