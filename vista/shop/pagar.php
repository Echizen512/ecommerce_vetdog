<?php 
session_start();
$con  = new mysqli("localhost","root","","vetdog");
if(!empty($_POST)){
$q1 = $con->query("insert into venta(fecha,numfact,estado,id_due,total,tipoc,tipopa) 
    value(NOW(), \"$_POST[numfact]\",1, \"$_POST[id_due]\", \"$_POST[total]\", \"$_POST[tipoc]\",  \"$_POST[tipopa]\")");
if($q1){
$id_venta = $con->insert_id;


foreach($_SESSION["CARRITO"] as $indice => $c){
$q1 = $con->query("insert into productos_vendidos(id_prod,canti,id_venta) value($c[ID],$c[CANTIDAD],$id_venta)");
$q1 = $con->query
            ("update products SET stock = '$c[STOCK]' - $c[CANTIDAD] WHERE id_prod = $c[ID];");

            
}
unset($_SESSION["CARRITO"]);
}
}
print "<script>alert('Compra procesada exitosamente');window.location='shop';</script>";
?>