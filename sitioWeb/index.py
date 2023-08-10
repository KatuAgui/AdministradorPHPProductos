def buscar_elemento(lista, valor):
    if valor in lista:
        return "Encontrado"
    else:
        return "No encontrado"

def contador_palabras(cadena):
    palabras = cadena.split()
    contador = {}
    for palabra in palabras:
        if palabra in contador:
            contador[palabra] += 1
        else:
            contador[palabra] = 1
    return contador

def es_primo(numero):
    if numero <= 1:
        return False
    for i in range(2, int(numero ** 0.5) + 1):
        if numero % i == 0:
            return False
    return True

def fibonacci(n):
    if n <= 0:
        return []
    elif n == 1:
        return [0]
    elif n == 2:
        return [0, 1]
    else:
        fib_sequence = [0, 1]
        for i in range(2, n):
            fib_sequence.append(fib_sequence[i - 1] + fib_sequence[i - 2])
        return fib_sequence

def es_palindromo(cadena):
    cadena = cadena.lower().replace(" ", "")
    return cadena == cadena[::-1]

def suma_matrices(matriz1, matriz2):
    resultado = []
    for i in range(len(matriz1)):
        fila = []
        for j in range(len(matriz1[i])):
            fila.append(matriz1[i][j] + matriz2[i][j])
        resultado.append(fila)
    return resultado

def ordenamiento_burbuja(lista):
    n = len(lista)
    for i in range(n):
        for j in range(0, n - i - 1):
            if lista[j] > lista[j + 1]:
                lista[j], lista[j + 1] = lista[j + 1], lista[j]
    return lista

def numero_mayor_menor(lista):
    return max(lista), min(lista)

def contar_vocales(cadena):
    vocales = "aeiouAEIOU"
    contador = 0
    for char in cadena:
        if char in vocales:
            contador += 1
    return contador

def validar_contrasena(contrasena):
    if len(contrasena) >= 8 and any(c.isupper() for c in contrasena) and any(c.islower() for c in contrasena) and any(c.isdigit() for c in contrasena):
        return True
    else:
        return False

# Pruebas de los ejercicios
if __name__ == "__main__":
    lista = [1, 2, 3, 4, 5]
    valor = 3
    print(buscar_elemento(lista, valor))

    cadena = "Hola hola mundo mundo hola"
    print(contador_palabras(cadena))

    numero = 17
    print(es_primo(numero))

    n = 10
    print(fibonacci(n))

    cadena = "radar"
    print(es_palindromo(cadena))

    matriz1 = [[1, 2], [3, 4]]
    matriz2 = [[5, 6], [7, 8]]
    print(suma_matrices(matriz1, matriz2))

    lista = [5, 2, 9, 1, 5, 6]
    print(ordenamiento_burbuja(lista))

    print(numero_mayor_menor(lista))

    cadena = "Hola mundo"
    print(contar_vocales(cadena))

    contrasena = "P@ssw0rd"
    print(validar_contrasena(contrasena))

# Declaración de una lista
mi_lista = [1, 2, 3, 4, 5]

# Imprimir el contenido de la lista usando un bucle for
for elemento in mi_lista:
    print(elemento)
# Imprimir los elementos y sus índices usando la función enumerate
for indice, elemento in enumerate(mi_lista):
    print(f"Índice: {indice}, Elemento: {elemento}")

numeros = [3, 8, 2, 6, 10, 4]
for numero in numeros:
    if numero > 5:
        print(numero)
    else:
        print(f"{numero} - Menor o igual que 5")

