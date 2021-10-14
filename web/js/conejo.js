function agregarProducto(){

    let r = document.getElementById('inputGroup').firstChild;
    let nuevo = r.cloneNode(true);

    let tr = document.createElement("tr");
    for(let i=0; i<3;i++){
        tr.append(document.createElement("td"));        
    }

    let arraytd = tr.childNodes; 

    arraytd[1].append(nuevo);
    arraytd[0].innerHTML=`<input type="number" class="form-control" name="cantidad[]">`;
    arraytd[2].innerHTML=`<button type="button" class="btn btn-danger form-control" onclick="quitarProducto(this)">-</button>`;

    for(let i=0;i<arraytd.length;i++){
        tr.append(arraytd[i]);
    }
    let tbody = document.getElementById('agregar');
    tbody.append(tr);
    if(tbody.childNodes.length>=1){
        let botones = `<button type="button" class="btn btn-danger text-white" onclick="limpiar()">Limpiar</button><input type="submit" class="btn btn-primary text-white" value="Guardar">`;
        document.getElementById("botones").innerHTML=botones;
    }
    
}

function botones(){
    let tbody = document.getElementById('agregar');
    tbody.append(tr);
    if(tbody.childNodes.length>=1){
        let botones = `<button type="button" class="btn btn-danger text-white" onclick="limpiar()">Limpiar</button><input type="submit" class="btn btn-primary text-white" value="Guardar">`;
        document.getElementById("botones").innerHTML=botones;
    }
}

// function load(){
//     let tbody = document.getElementById("agregar");
//     alert("hola");
//     if(tbody.childNodes.length>=1){
//         let botones = `<button type="button" class="btn btn-danger text-white" onclick="limpiar()">Limpiar</button><input type="submit" class="btn btn-primary text-white" value="Guardar">`;
//         document.getElementById("botones").innerHTML=botones;
//     }
// }

function quitarProducto(nodo){
    nodo.parentNode.parentNode.remove();
    let tbody = document.getElementById('agregar');
    if(tbody.childNodes.length==0){
        document.getElementById("botones").innerHTML=null;
    }
}

function limpiar(){
    let nodo = document.getElementById("agregar");
    nodo.innerHTML = null;
    document.getElementById("botones").innerHTML=null;
}