import React, { Component } from 'react'

class nav extends Component {

    constructor(props) {
        super(props)  
    }

    render() {
        return (
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="">
                    <div class="maiflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src={require(("./../img/"+ this.props.foto))} alt="card image"></img></p>
                                    <h4 class="card-title">{this.props.titulo}</h4>
                                    <p class="card-text">{this.props.texto_1}</p>
                                    <p className="disable-text">{this.props.texto_2}</p>
                                    <a href="#" class="btn btn-success">{this.props.boton}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}


export default nav