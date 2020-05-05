export class Programa {
    $key: string;
    nombre: string;
    integrantes: {
        conductor: string;
        panelistas: object;
        produccion: object;
        operador: string;
    }
    descripcion: string;
    presentacion: string;
    horario: {
        lunes: string;
        martes: string;
        miercoles: string;
        jueves: string;
        viernes: string;
        sabado: string;
        domingo: string;
    }
}
