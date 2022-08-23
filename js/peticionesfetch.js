
function conectarConServidor(datos){
    return new Promise((resolve,reject)=>{
        fetch('metodos.php',{
            method:'POST',
            body:JSON.stringify(datos),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })        
        .then((data)=> {                    
            if(data.ok){
                return data.json();
            }
            reject('Ocurrio un error'+ data);
        })
        .then((data) =>{                 
            resolve(data);
        })
        .catch(function(error) {
            console.log(error);
            reject(error);
        })
    })
    
}

function enviarAlServidorXFormData(datos){    
    return new Promise((resolve,reject)=>{
        fetch('metodosFormData.php',{
            method:'POST',
            body:datos,
        })        
        .then((data)=> {            
            if(data.ok){
                return data.json();
            }
            reject('Ocurrio un error '+ data);
        })
        .then((data) =>{
            resolve(data);
        })
        .catch(function(error) {
            reject(error);
        })
    })    
}