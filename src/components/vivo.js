import React, { Component } from 'react'

class vivo extends Component {
    render() {
        return (
            <nav className="navbar navbar-expand-lg navbar-light bg-light">
                <a className="navbar-brand" href="#">
                    <h3>EN VIVO</h3> 
                </a>
                <div id="player_div" className="rounded">
                        <iframe id="player_pc" width="60%" height="380" src="https://www.reproface.com.ar/html5/player.php?id=8412529"></iframe>
                </div>
            </nav>
        )
    }
}


export default vivo