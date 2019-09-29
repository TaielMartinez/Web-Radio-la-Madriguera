import React, { Component } from 'react'

class carusel extends Component {
    render() {
        return (
            <div id="carouselExampleIndicators" className="carousel slide " data-ride="carousel">
                <ol className="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" className="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
                <div className="carousel-inner">
                    <div className="carousel-item active">
                        <img src={require("./../img/portada (1).jpeg")} className="d-block w-100" alt="..."></img>
                    </div>
                    <div className="carousel-item">
                        <img src={require("./../img/portada (2).jpeg")} className="d-block w-100" alt="..."></img>
                    </div>
                    <div className="carousel-item">
                        <img src={require("./../img/portada (3).jpeg")} className="d-block w-100" alt="..."></img>
                    </div>
                    <div className="carousel-item">
                        <img src={require("./../img/portada (4).jpeg")} className="d-block w-100" alt="..."></img>
                    </div>
                    <div className="carousel-item">
                        <img src={require("./../img/portada (5).jpeg")} className="d-block w-100" alt="..."></img>
                    </div>
                    <div className="carousel-item">
                        <img src={require("./../img/portada (6).jpeg")} className="d-block w-100" alt="..."></img>
                    </div>
                </div>
                <a className="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span className="sr-only">Anterior</span>
                </a>
                <a className="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span className="carousel-control-next-icon" aria-hidden="true"></span>
                    <span className="sr-only">Siguiente</span>
                </a>
            </div>
        )
    }
}


export default carusel