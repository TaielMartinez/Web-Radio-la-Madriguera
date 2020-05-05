import { Injectable } from '@angular/core';

import { AngularFireDatabase, AngularFireList } from 'angularfire2/database';
import { HttpClient } from '@angular/common/http'

import { Programa } from '../clases/programa';



@Injectable({
  providedIn: 'root'
})
export class ProgramasService {

  programasLista: AngularFireList<any>
  local_programaSeleccionado: Programa = new Programa()

  constructor(private http: HttpClient) {}


  getPrograma()
  {
    return this.http.get("https://radio-madriguera.firebaseio.com/programas.json")
  }
/*
  insertPrograma(programa: Programa)
  {
    this.programasLista.push({
      nombre: programa.nombre,
      integrantes: {
          conductor: programa.integrantes.conductor,
          panelistas: programa.integrantes.panelistas,
          produccion: programa.integrantes.produccion,
          operador: programa.integrantes.operador,
      },
      descripcion: programa.descripcion,
      presentacion: programa.presentacion,
      horario: {
          lunes: programa.horario.lunes,
          martes: programa.horario.martes,
          miercoles: programa.horario.miercoles,
          jueves: programa.horario.jueves,
          viernes: programa.horario.viernes,
          sabado: programa.horario.sabado,
          domingo: programa.horario.domingo,
      }
    })
  }

  updatePrograma(programa: Programa)
  {
    this.programasLista.update(programa.$key, {
      nombre: programa.nombre,
      integrantes: {
          conductor: programa.integrantes.conductor,
          panelistas: programa.integrantes.panelistas,
          produccion: programa.integrantes.produccion,
          operador: programa.integrantes.operador,
      },
      descripcion: programa.descripcion,
      presentacion: programa.presentacion,
      horario: {
          lunes: programa.horario.lunes,
          martes: programa.horario.martes,
          miercoles: programa.horario.miercoles,
          jueves: programa.horario.jueves,
          viernes: programa.horario.viernes,
          sabado: programa.horario.sabado,
          domingo: programa.horario.domingo,
      }
    })
  }

  deletePrograma($key: string)
  {
    this.programasLista.remove($key)
  }*/
}
