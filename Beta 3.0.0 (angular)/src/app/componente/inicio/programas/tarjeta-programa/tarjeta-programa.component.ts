import { Component, OnInit } from '@angular/core';

import { ProgramasService } from 'src/app/servicios/programas.service';

import { Programa } from '../../../../clases/programa'

@Component({
  selector: 'app-tarjeta-programa',
  templateUrl: './tarjeta-programa.component.html',
  styleUrls: ['./tarjeta-programa.component.scss']
})
export class TarjetaProgramaComponent implements OnInit {

programasLista: Programa[]

constructor(private programaService: ProgramasService) { }

ngOnInit() {/*
  this.programaService.getPrograma()
  .snapshotChanges()
  .subscribe(item => {
    this.programasLista = []
    item.forEach(element => {
      let local = element.payload.toJSON()
      local["$key"] = element.key
      this.programasLista.push(local as Programa)
    })
  })*/
}

}
