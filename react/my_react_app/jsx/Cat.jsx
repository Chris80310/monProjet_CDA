import axios from "axios";
import React, { useEffect, useState } from "react";
// import { Button, Card, CardImg, Spinner } from "react-bootstrap";
import { useNavigate, BrowserRouter, Route, Switch } from "react-router-dom";

// const Cat = (props) => {
//     //etat de l'animation du chargement des donnees
//     const [loading, setLoading] = useState(true);
//     const [categories, setCategories] = useState([]);

//     //const [users, setUsers] = useState([]);

//     //on va appeler cette api pour récupérer un tableau d'utilisateurs 
//     // useEffect(() => {
//     //     axios.get("https://reqres.in/api/users?per_page=20").then((response) => {
//     //         setUsers(response.data.data);
//     //         // console.log(response.data.data);
//     //         setLoading(false);
//     //     }).catch(thrown => { });
//     // }, []);


//     useEffect(() => {
//         axios.get("http://127.0.0.1:8000/api/cats",
//             {
//                 headers: {
//                     Accept: "application/json"
//                 }
//             }).then((response) => {
//                 setCategories(response.data);
//                 console.log(response);
//                 setLoading(false);
//             }).catch(thrown => { });

//     }, []);

//     return (
//         <div className={"container"}>
//             {
//                 categories ? (
//                     <>
//                         <div className="row">
//                             <div className={'col-12 mt-4'}>
//                                 <h1 className={'p-3 text-center'} style={{ color: "#4169E1", fontSize: "2.8em" }}>Catégories</h1>
//                                 <hr />
//                             </div>
//                         </div>
//                         <div className="row">

//                             {
//                                 categories && categories.map((item, index) => (
//                                     <div key={index} onClick={() => { handleClick(cat) }} className="clickable col-12 col-sm-6 col-md-4 col-xl-3 mb-3">
//                                         <div className="col-md-4 p-2" key={index}>
//                                             <Card style={{ width: '18rem' }}>
//                                                 <Card.Img variant="top" 
//                                                 src={'/assets/img/cat/' + item.imgCat} 
//                                                 // src={Cat.imgCat} 
//                                                 />
//                                                 <Card.Body>
//                                                     <Card.Title>{item.libelleCat}</Card.Title>
//                                                 </Card.Body>
//                                             </Card>
//                                         </div>
//                                     </div>)
//                                 )}

//                         </div>
//                     </>
//                 ) : (
//                     <Spinner animation="grow" variant="info" />
//                 )
//             }

//         </div>
//     );

function Cat() {

    const [liste, setListe] = useState([])

    const navigate = useNavigate();

    useEffect(() => {
        axios("https://127.0.0.1:8000/api/cats", {
            headers: {
                Accept: "application/json"
            }
        })
            .then((reponse) => {
                setListe(reponse.data);
            })
    }, [])

    const handleClick = (cat) => {

        navigate("/scats/" + cat.id, { replace: true });
    }

    return (
        <>

            <div className='row'>

                {
                    liste.map((cat, index) => (
                        <div key={index} onClick={() => { handleClick(cat) }} className="clickable col-12 col-sm-6 col-md-4 col-xl-3 mb-3">

                            <div className="card">
                                <img src={cat.image} className="card-img-top" alt="..." />

                                <div className="card-body">
                                    <h5 className="card-title">{cat.libelleCat}</h5>
                                </div>
                            </div>
                        </div>
                    ))
                }
            </div>
        </>
    );
}

export default Cat