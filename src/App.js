import React, { Component } from 'react';
//import logo from './logo.svg';
import './App.css';

import Navigation from './components/nav.js'
import Carusel from './components/carusel.js'
import Vivo from './components/vivo.js'
import Programas from './components/programas.js'
import Nosotros from './components/nosotros.js'
import Contratar_tarjeta from './components/contratar_tarjeta.js'

import { programas } from './programas.json'

class App extends Component {

  constructor() {
    super()
    this.state = { programas }
  }

  render() {
    const program = this.state.programas.map((val, i) => {
        return(
          <Programas 
          nombre={val.nombre}
          subtitulo={val.subtitulo}
          descripcion={val.descripcion}
          foto={val.foto}
          horario={val.horario}
          />
        )
    })

    return(
        <div>
          <Navigation/>
          <div className="container">
            <Carusel/>
            <Vivo/>
            <section id="team" className="pb-5">
              <div className="container">
                <div className="row">
                  { program }
                </div>
              </div>
            </section>
            <Nosotros/>

            <div className="contain bg-white">
                <div className="contain bg-white">
                    <h1 className="text-center">REALIZAR RADIO!</h1>
                    <h4 className="ml-5"></h4>
                    <p className="ml-3 mr-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem obcaecati at quasi perferendis facere commodi doloribus officiis quae unde nesciunt, cupiditate veritatis quidem ipsum officia saepe pariatur ab, praesentium non. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil veritatis provident quod eius neque eveniet esse culpa, officiis, at totam tempora sed necessitatibus nulla, iure commodi rerum voluptate dicta iusto. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptas molestias repellendus odit hic vitae rerum, ea sunt, nisi aut sint tempore quod consequuntur explicabo. Exercitationem magni ullam sit ad.</p>
                
                    <div className="row">
                      <Contratar_tarjeta
                        foto="logo.jpg"
                        titulo="GRABACIONES"
                        texto_1="Podcast - Musica - Radioteatro"
                        texto_2="Un estudio totalmente equipado a tu disposiciones. Ven a grabar lo que necesites. Microfonos de alta calidad, operadores capacitados y todos los equipos a tu dispocision. "
                        boton="Contactar"
                      />
                      <Contratar_tarjeta
                        foto="logo.jpg"
                        titulo="RADIO EN VIVO"
                        texto_1="Semanal - Diario - Grabado"
                        texto_2="Alguna vez quisite hacer radio en un estidio profecional? Hoy puede ser ese dia! Contactate con nosotros y podras venir a conocer el nuestras instalaciones sin ningun compromiso."
                        boton="Contactar"
                      />
                      <Contratar_tarjeta
                        foto="logo.jpg"
                        titulo="PODCAST"
                        texto_1="Vivo - Spotify - itune Podcast - Google Podcast - iVox"
                        texto_2="Queres tener un podcast profecional sin preocuparte? Nosotros somos la solucion! Realiza tu podcast en nuestro estudio y nosotros lo publicamos por vos!!!"
                        boton="Contactar"
                      />
                    </div>
                </div>
            </div>

            

          </div>
        </div>
    )
  }

}

/*
function App() {
  <div className="App">
    constructor() {
        super()
        this.state = {
            todos
        }
    }
    
  </div>
  
  return (
    <div className="App">
      <Navigation />
      <Creadores />
    </div>
  )*/

export default App
