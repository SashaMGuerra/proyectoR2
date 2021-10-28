/**
 * @author Sasha.
 * @version 1.0
 * @description Dibujo aleatorio de un tablero de juego de hundir la flota.
 */

//Tamaño del tablero.
const FILAS = 10;
const COLUMNAS = 10;

//Tamaños de los barcos.
const TAM_PORTAVIONES = 4;
const TAM_ACORAZADO = 3;
const TAM_DESTRUCTOR = 2;
const TAM_FRAGATA = 1;

/**
 * Tablero 10x10 vacío.
 */
var aTablero = [];
for (iFila = 0; iFila < FILAS; iFila++) {
    aFila = [];
    for (iColumna = 0; iColumna < COLUMNAS; iColumna++) {
        aFila.push('');
    }
    aTablero.push(aFila);
}

/**
 * Colocación de los barcos en el tablero.
 */
colocarBarco(TAM_PORTAVIONES);
colocarBarco(TAM_PORTAVIONES);
colocarBarco(TAM_ACORAZADO);
colocarBarco(TAM_ACORAZADO);
colocarBarco(TAM_ACORAZADO);
colocarBarco(TAM_DESTRUCTOR);
colocarBarco(TAM_DESTRUCTOR);
colocarBarco(TAM_DESTRUCTOR);
colocarBarco(TAM_FRAGATA);
colocarBarco(TAM_FRAGATA);

/**
 * Dibujo del tablero.
 */
document.write("<table>");
for (aFila of aTablero) {
    document.write("<tr>");
    for (sColumna of aFila) {
        if (sColumna !== '') {
            document.write(`<td class=${sColumna}></td>`);
        } else {
            document.write('<td></td>');
        }
    }
    document.write("</tr>");
}
document.write("</table>");

/**
 * Randomiza un número donde se colocará el barco.
 * @returns {int} Número en que se colocará.
 */
function randomNumber() {
    return Math.floor(Math.random() * 10);
}

/**
 * Randomiza una dirección en que se creará el barco.
 * @returns {string} "vertical" u "horizontal".
 */
function randomDirection() {
    random = Math.floor(Math.random() * 2);
    switch (random) {
        case 0:
            return "vertical";
        case 1:
            return "horizontal";
    }
}

/**
 * Coloca un barco en el tablero, dada su longitud.
 * Lo intenta hasta que esta pieza no se solape o sea adyacente con otras.
 * 
 * @param {int} size Longitud del barco.
 */
function colocarBarco(size) {
    do {
        repetir = false;
        filaInicial = randomNumber();
        columnaInicial = randomNumber();
        direccion = randomDirection();

        switch (direccion) {
            case 'vertical':
                if (filaInicial > 10 - size) {
                    repetir = true;
                } else {
                    /*
                     * Comprobación de espacios vacíos para la pieza.
                     */
                    fila = filaInicial;
                    filaMax = filaInicial + size;
                    for (; fila < filaMax && !repetir; fila++) {
                        if (aTablero[fila][columnaInicial] === 'ocupado' || aTablero[fila][columnaInicial] === 'barco') {
                            repetir = true;
                        }
                    }
                }

                /*
                 * Si se ha comprobado que puede colocarse, se coloca la pieza
                 * y se ocupan sus cuadros adyacentes si aún no están ocupados.
                 */
                if (!repetir) {
                    //Ocupado de las piezas adyacentes.
                    columna = columnaInicial - 1;
                    columnaMax = columnaInicial + 1;

                    // Para evitar error undefined, la columna mínima será 0, y la máxima 9.
                    if (columna < 0) {
                        columna = 0;
                    }
                    if (columnaMax > 9) {
                        columnaMax = 9;
                    }

                    for (; columna <= columnaMax; columna++) {
                        fila = filaInicial - 1;
                        filaMax = filaInicial + size;

                        // Para evitar error undefined, la fila mínima será 0, y la máxima 9.
                        if (fila < 0) {
                            fila = 0;
                        }
                        if (filaMax > 9) {
                            filaMax = 9;
                        }
                        /*
                         * Por cada fila de cada columna, si el elemento todavía
                         * no está ocupado, lo ocupa.
                         */
                        for (; fila <= filaMax; fila++) {
                            if (aTablero[fila][columna] !== 'ocupado') {
                                aTablero[fila][columna] = 'ocupado';
                            }
                        }
                    }

                    //Ocupado de las piezas barco.
                    fila = filaInicial;
                    filaMax = filaInicial + size;
                    for (; fila < filaMax; fila++) {
                        aTablero[fila][columnaInicial] = 'barco';
                    }
                }
                break;
            case 'horizontal':
                if (columnaInicial > 10 - size) {
                    repetir = true;
                } else {
                    /*
                     * Comprobación de espacios vacíos para la pieza.
                     */
                    columna = columnaInicial;
                    columnaMax = columnaInicial + size;
                    for (; columna < columnaMax && !repetir; columna++) {
                        if (aTablero[filaInicial][columna] === 'ocupado' || aTablero[filaInicial][columna] === 'barco') {
                            repetir = true;
                        }
                    }
                }

                /*
                 * Si se ha comprobado que puede colocarse, se coloca la pieza
                 * y se ocupan sus cuadros adyacentes si aún no están ocupados.
                 */
                if (!repetir) {
                    //Ocupado de las piezas adyacentes.
                    fila = filaInicial - 1;
                    filaMax = filaInicial + 1;

                    // Para evitar error undefined, la fila mínima será 0, y la máxima 9.
                    if (fila < 0) {
                        fila = 0;
                    }
                    if (filaMax > 9) {
                        filaMax = 9;
                    }

                    for (; fila <= filaMax; fila++) {
                        columna = columnaInicial - 1;
                        columnaMax = columnaInicial + size;


                        // Para evitar error undefined, la columna mínima será 0, y la máxima 9.
                        if (columna < 0) {
                            columna = 0;
                        }
                        if (columnaMax > 9) {
                            columnaMax = 9;
                        }

                        /*
                         * Por cada fila de cada columna, si el elemento todavía
                         * no está ocupado, lo ocupa.
                         */
                        for (; columna <= columnaMax; columna++) {
                            if (aTablero[fila][columna] !== 'ocupado') {
                                aTablero[fila][columna] = 'ocupado';
                            }
                        }
                    }

                    //Ocupado de las piezas barco.
                    columna = columnaInicial;
                    columnaMax = columnaInicial + size;
                    for (; columna < columnaMax; columna++) {
                        aTablero[filaInicial][columna] = 'barco';
                    }
                }
                break;
        }
    } while (repetir);
}