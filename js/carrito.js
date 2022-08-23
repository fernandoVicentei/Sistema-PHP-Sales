// e.target.classlist.contains(''){
//     console.log(e.target.parentElement)
// }

function Carrito(){
    this.catalogo = [];
    this.constructor = function(){
        if(localStorage.getItem("carrito")==null){
            localStorage.clear();
            localStorage.setItem('carrito','[]');
        }
    }

    this.getCarrito = JSON.parse(localStorage.getItem("carrito"));
    
    this.agregarItem = function(item){
        for (i of this.getCarrito){
            if(i.id === item.id){
                i.cantidad++;
                console.log(this.getCarrito);
                localStorage.setItem("carrito",JSON.stringify(this.getCarrito))
                return;
            }
        }
        var registro=item;
        registro.cantidad = 1;
        this.getCarrito.push(registro);
        console.log(this.getCarrito);
        localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
    }
    this.getTotal = function(){
        var total = 0;
        for (i of this.getCarrito) {
            total += parseFloat(i.cantidad) * parseFloat(i.precio);
        }
        return total;
    }
    this.eliminarItem = function(item){
        for (var i in this.getCarrito) {
            if(this.getCarrito[i].id === item){
                this.getCarrito.splice(i,1);
            }
        }
        localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
    }
    this.actualizarItem=function(item){
        for (i of this.getCarrito){
            if(i.id === Number(item.id)){
                i.cantidad=item.cantidad;
                localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
                return;
            }
        }
    }
    this.vaciarCarrito=function(){
        this.getCarrito=[];
        localStorage.setItem("carrito",JSON.stringify(this.getCarrito));
        
    }


}