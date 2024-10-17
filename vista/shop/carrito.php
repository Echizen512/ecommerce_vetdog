<?php
$mensaje = "";
if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt($_POST['id_prod'], COD, KEY))) {
                $id_prod = openssl_decrypt($_POST['id_prod'], COD, KEY);
            }
            if (is_string(openssl_decrypt($_POST['nompro'], COD, KEY))) {
                $nompro = openssl_decrypt($_POST['nompro'], COD, KEY);
            } else {
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['precV'], COD, KEY))) {
                $precV = openssl_decrypt($_POST['precV'], COD, KEY);
            } else {
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['canti'], COD, KEY))) {
                $canti = openssl_decrypt($_POST['canti'], COD, KEY);
            } else {
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['stock'], COD, KEY))) {
                $stock = openssl_decrypt($_POST['stock'], COD, KEY);
            } else {
                break;
            }
            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'ID' => $id_prod,
                    'NOMBRE' => $nompro,
                    'PRECIO' => $precV,
                    'CANTIDAD' => $canti,
                    'STOCK' => $stock
                );
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado al carrito <br><br>";
            } else {
                $idProductos = array_column($_SESSION['CARRITO'], 'ID');
                if (in_array($id_prod, $idProductos)) {
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        if ($producto['ID'] == $id_prod) {
                            $_SESSION['CARRITO'][$indice]['CANTIDAD'] += $canti;
                            $mensaje = "Producto agregado al carrito <br>";
                            $mensaje .= "Hay " . $_SESSION['CARRITO'][$indice]['CANTIDAD'] . " articulos en el carrito de este mismo producto<br><br>";
                        }
                    }
                } else {
                    $numeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'ID' => $id_prod,
                        'NOMBRE' => $nompro,
                        'PRECIO' => $precV,
                        'CANTIDAD' => $canti,
                        'STOCK' => $stock
                    );
                    $_SESSION['CARRITO'][$numeroProductos] = $producto;
                    $mensaje = "Producto agregado al carrito <br><br>";
                }
            }
            break;
        case "Eliminar":
            if (is_numeric(openssl_decrypt($_POST['id_prod'], COD, KEY))) {
                $id_prod = openssl_decrypt($_POST['id_prod'], COD, KEY);
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['ID'] == $id_prod) {
                        unset($_SESSION['CARRITO'][$indice]);
                        $_SESSION['CARRITO'] = array_values($_SESSION["CARRITO"]);
                        echo "<script>alert('Producto eliminado');</script>";
                        break;
                    }
                }
            } else {
                break;
            }
            break;
    }
}
?>