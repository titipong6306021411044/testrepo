<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="loadContent()">
    <h3>input ID&Name</h3>
    <input type="input" id="u_id">
    <input type="input" id="u_name">
    <button onclick="add_new()">Add new</button><hr>
    <div id="out"></div>
    <script>
    function loadContent(){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            console.log(this.readyState+", "+ this.status);
            if(this.readyState==4 && this.status==200){
                // alert(this.responseText);
                // my = JSON.parse(this.responseText)
                console.log(this.responseText);
                data = JSON.parse(this.responseText);
                create_table(data)
            }
        }
        xhttp.open("GET", "02 rest.php", true);
        xhttp.send();
        // xtttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhttp.send("a=12&b=15");
    }
    function add_new(){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status ==200){
                alert(this.responseText);
                text = JSON.parse(this.responseText);
                create_table(text)
            }
        }
        xhttp.open("POST", "02 rest.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        u_id = document.getElementById("u_id");
        u_name = document.getElementById("u_name");
        xhttp.send("u_id="+u_id.value+"&u_name="+u_name.value);
    }
    function create_table(text){
        out = document.getElementById("out");
        out.innerHTML = "";
                console.log(out.length);
                text = "<table border='1'>";
                for(i=0;i<data.length;i++){
                    text += "<tr>";
                    for(inf in data[i]){
                        text += "<td>"+data[i][inf]+"</td>";
                    }
                    text+= "</tr>";
                }
                text+="</table>";
                out.innerHTML += text;
    }
    </script>
</body>
</html>