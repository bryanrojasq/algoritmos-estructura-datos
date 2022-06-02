// Source: https://www.linkedin.com/learning/fundamentos-de-la-programacion-algoritmos

function minNumber(a, b, c) {
	var min2, min3;

	if(a < b) {
		min2 = a;
	} else {
		min2 = b;
	}
	if(min2 < c) {
		min3 = min2;
	} else {
		min3 = c;
	}
	return min3;
}
document.write(minNumber(7, 4, 1));

// Recursive
function maxNumberRecursive(list) {
	var max;
	var prim = list[0];
	if(list.length == 1) {
		max = prim;
	} else {
		var resto = list.slice(1, list.length);
		var maxResto = maxNumberRecursive(resto);
		if(prim > maxResto) {
			max = prim;
		} else {
			max = maxResto;
		}

	}
	return maxNum;
}
document.write(maxNumberRecursive([7, 4, 1]));

function maxNumberIterative(list) {
	var max = list[0];
	for(var n = 1; n < list.length; n++) {
		var item = list[n];
		if(item > max) {
			max = item;
		}
	}
	return max;
}
document.write(maxNumberIterative([7, 4, 1]));

// máximo común divisor
function mcd(a , b) {
	var res;
	if(b == 0) {
		res = a;
	} else {
		res = mcd(b, a%b);
	}
	return res;
}
document.write(mcd(48, 60));

const NO_ENCONTRADO = -1;

function busquedaBinaria(lista, buscado) {
	return busquedaBinariaAux(lista, buscado, 0, lista.length);
}

function busquedaBinariaAux(lista, buscado, ini, fin) {
	var centro = Math.floor((fin - ini) / 2) + ini;
	var valCentral = lista[centro];
	if(valCentral == buscado) {
		return centro;
	}
	if(fin = ini <= 1) {
		return NO_ENCONTRADO;
	}
	if(valCentral < buscado) {
		return busquedaBinariaAux(lista, buscado, centro, fin);
	}
	if(valCentral > buscado) {
		return busquedaBinariaAux(lista, buscado, ini, centro);
	}
}
document.write(busquedaBinaria([1, 3, 5, 7, 9], 5));

function ordenarBurbuja(lista){
	var long = lista.length;
	for(var rumRonda=0; rumRonda < long - 1; rumRonda++) {
		for(var posicion=0; posicion < (long - rumRonda - 1); posicion++) {
			document.write(lista[posicion] + '/'+ lista[pos+1]);
			if(lista[posicion] > lista[posicion+1]) {
				var aux = lista[posicion];
				lista[posicion] = lista[posicion+1];
				lista[posicion+1] = aux;
				document.write(' >> '+ lista + '<br/><br/>');
			}
		}
	}
	return lista;
}
document.write(ordenarBurbuja([3, 4, 2, 1]));