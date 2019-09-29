import React, { Component } from 'react'

class nav extends Component {
    render() {
        return (
            <nav className="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <a className="navbar-brand" href="#inicio">
                    <img src={require("./../img/logo.jpg")} width="40" height="30" className="d-inline-block align-top mr-3" alt=""></img>
                    MADRIGUERA
                    </a>
                <div className="collapse navbar-collapse position-relative" id="navbarText">
                    <ul className="navbar-nav mr-auto">
                    <li className="nav-item active card mr-1 bg-warning">
                        <a className="nav-link" href="#vivo">Escuchar en Vivo <span className="sr-only">(current)</span></a>
                    </li>
                    <li className="nav-item card mr-1">
                        <a className="nav-link" href="#programas">Programas</a>
                    </li>
                    <li className="nav-item card mr-1">
                        <a className="nav-link" href="#">Realizar radio!</a>
                    </li>
                    </ul>
                    <span className="navbar-text">
                    No se vende fafafa
                    </span>
                </div>
            </nav>
        )
    }
}


export default nav