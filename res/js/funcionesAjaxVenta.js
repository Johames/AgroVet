
//controlador del venta con angular
var app = angular.module('myApp', ['ngMaterial']);
app.controller('venta', function($scope, $http,$location) {
  $scope.venta = true;
  $scope.ventaagregar = 0;
  $scope.listadetalle={};
  $scope.agregardetalle={};
  $scope.selected=false;
//listar productos _buscador

  $scope.ListaProducto = function(campo) {
       $http.post('controller/ventadao.php', {
           'campo': campo,
           'accion': 1
       }).then(function(response) {
           $scope.Producto = response.data;
       });
   };

//agregar a carrito de venta; el scope permite hacer el llamado en cualquier lado de la venta.
   $scope.AgregarDetalle = function(productosucursalid,nombre,precio,stockactual,stockminimo) {
          if(productosucursalid!=null){
         $scope.ventaagregar = 1;
         $scope.productosucursalid=productosucursalid;
         $scope.nombre=nombre;
         $scope.precio=precio;
         $scope.accion=2;
         $scope.stockactual=stockactual;
         $scope.cantidad=1;
         $scope.descuento=0;
         $scope.stockminimo=stockminimo;
       };
    };

//agregar la lista al detalle venta
$scope.ListaDetalleVentaInicial = function() {
     $http.post('controller/ventadao.php', {
       'accion':0
     }).then(function(response) {
         $scope.detalle_venta = response.data;
     });
 };


//carga los datos en el detalle
$scope.ListaDetalleVenta = function(info) {
var cantidad=info.cantidad;
var descuento=info.descuento;
if(cantidad==null || cantidad==''){
  cantidad=$scope.cantidad;

}
if(descuento==null || descuento==''){
  descuento=$scope.descuento;
}
var productosucursalid=info.productosucursalid;
var nombre=info.nombre;
var precio=info.precio;

var stockactual=info.stockactual;
var accion=info.accion;
  if(cantidad<=stockactual){
     $http.post('controller/ventadao.php', {
       'productosucursalid':productosucursalid,
       'nombre':nombre,
       "cantidad":cantidad,
       'precio':precio,
        "stockactual":stockactual,
        "descuento":descuento,
        "accion":accion
     }).then(function(response) {
         $scope.detalle_venta = response.data;
     });
       }
 };


 $scope.elimiprodetlle=function(productosucursalid){
   $scope.accion=4;
   $scope.productosucursalid=productosucursalid;
   $http.post('controller/ventadao.php', {
     'productosucursalid':productosucursalid,
     'accion':4
   }).then(function(response) {
       $scope.detalle_venta = response.data;
   });

 };


 //si hay datos en la sesion me los Lista
  $scope.volveragregarproducto=function(){
    $scope.venta = true;
  };



$scope.detallesgeneralesventa=function(id){
  if(id===0){

  }else{
    $scope.venta = false;
  }
};


$scope.editardetalleventa=function(productosucursalid,nombre,cantidad,precio,descuento,stockactual){
        $scope.ventaagregar=1;
        $scope.accion=3;
        $scope.productosucursalid=productosucursalid;
        $scope.nombre=nombre;
        $scope.cantidad=cantidad;
        $scope.precio=precio;
        $scope.descuento=descuento;
        $scope.stockactual=stockactual;

};


//saca toatl de base de dtaos
$scope.MontoTotalVenta=function(){
    $http.post('controller/ventadao.php', {'accion':4}).then(function(response) {
               $scope.totalventa = response.data;
           });
};



$scope.selecteditdetalle=function(listadetalle){
  $scope.agregardetalle=listadetalle;
  $scope.ventaagregar=1;
  $scope.accion=3;
  $scope.selected=true;

};


$scope.ListaCliente=function(campo){
  $http.post('controller/ventadao.php', {
      'campo': campo,
      'accion': 5
  }).then(function(response) {
      $scope.Cliente = response.data;
  });
};

$scope.AgregarCliente=function(personaid,nombrec,num_documento,direccion){


    $scope.personaid=personaid;
    $scope.nombrec=nombrec;
    $scope.num_documento=num_documento;
    $scope.direccion=direccion;
  
};


$scope.cancelarVentas=function(){
  $http.post('controller/ventadao.php', {
      'accion': 6
  }).then(function(response) {
      $scope.detalle_venta = response.data;
    //  location.reload();
  });
};



$scope.InsertaDetalleventa=function(){
  var personaid=$scope.personaid;
  var transaccion=$scope.transaccion;
  $http.post('controller/ventadao.php', {
      'personaid':personaid,
      'transaccion':transaccion,
      'accion': 7
  }).then(function(response) {
     location.reload();
  });

};


});
