import React, { Component } from 'react'

import { todos } from './../creadores.json'

class reproductor extends Component {
    constructor() {
        super()
        this.state = {
            todos
        }
    }
    render() {
        const creadores = this.state.todos.map((todo, i) => {
            return(
                <div className="card">
                    {todo}
                </div>
            )
        })
        return(
            <div>
                { creadores.nombre }
            </div>
        )
    }
}


export default reproductor