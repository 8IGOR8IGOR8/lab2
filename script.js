function Load() {
    if("save" in localStorage) {
        document.getElementById("toLoad").innerHTML = decodeURI(localStorage.getItem("save"));
        localStorage.setItem("save", document.getElementById("toSave").innerHTML);
    }
    else {
        document.getElementById("toLoad").innerHTML = "No saved content";
    }
}

function Save() {
    localStorage.setItem("save", document.getElementById("toSave").innerHTML);
}