//console.log("Sono uno script");

// fa caricare la pagina successivamente 
//alert("ciao sono un popup");

var x = 100;

//document.write(x + "<br>");

var test = document.getElementById("test");

// if(!bool){
//     //iniettare testo dentro div ma sovrascrive ogni volta
//     test.innerHTML = "Condizione vera";
// } else {
//     test.innerHTML = "Condizione falsa";
// }


var testo = "";
for (let i = 0; i < 5; i++) {
    testo += "<div class=\"box\"><h2>Header</h2><p>il mondo è bello!</p></div>";       
}

test.innerHTML = testo;

var label = document.getElementById("label");
var numero = document.getElementById("numero");

var str = label.value;
var x = numero.value;

document.write(typeof str);
document.write(typeof x);

if((typeof x) == "string"){
    x = parseInt(x);
    document.write(typeof x);
}

var bool = "true";
var bool = Boolean(bool);
document.write(typeof bool);

// test.style.color = "red";
// test.style.backgroundColor = "yellow";

function setTemplate(color, backColor){
    // null invece è la stessa cosa ma è un oggetto
    // per verificare se qualcosa esiste o no
    // return undefined;
    test.style.color = color;
    test.style.backgroundColor = backColor;
}

var prenota = document.getElementById("btPrenota");

prenota.addEventListener("click", function () {
    setTemplate('red', 'blue');
});



if(prenota.addEventListener){
    prenota.addEventListener("click", function(){
        setTemplate('red', 'blue');
    });
} else if (prenota.attachEvent) {
    prenota.attachEvent("click", function(){
        setTemplate('red', 'blue');
    });
}

function toggle(){
    var nav = document.getElementById("navbar");
    if(nav.style.display == "none"){
        nav.style.display = "block";
    } else {
        nav.style.display = "none";
    }
}

//onload
//onkeydown
//onclick

function tutorial(){

    // var testo1 = new String("esempio di testo!");
    // var testo2 = "esempio di testo!";

    // // sono uguali ma non identici
    // var testo = Boolean(testo1 === testo2);

    var testo = document.getElementById("label").value;

    // misurare length testo
    var size = testo.length;

    // trovare posizione di una sottostringa (2 modi)
    // con indexOf si possono inserire le regex e da che posizione cercare
    var index = testo.indexOf("va?", 5);
    index = testo.search("a"); 

    // estrarre sottostringhe
    // con substring non possiamo inserire numeri negativi
    // con substr forniamo posizione iniziale e lunghezza stringa
    var sub = testo.slice(4, 5);
    sub = testo.slice(-5, -1);
    sub = testo.substring(0, 3);
    sub = testo.substr(0, 2);

    // sostituire strighe e caratteri
    // g per sostituire tutte le occorrenze
    var newStr = testo.replace(/ciao/ig, "buongiorno");

    // case sensitive stringhe
    newStr = testo.toUpperCase();
    newStr = testo.toLowerCase();

    // concatenare stringhe
    var str = testo.concat(" ", "Il mondo bello!");

    // estrarre i caratteri da posizione
    var char  = testo.charAt(3);

    // recuperare codice unicode di un carattere
    var uni = testo.charCodeAt(3);

    // dividere stringhe in array
    var car = testo[0];
    var array = testo.split(","); 


    document.getElementById("result").innerHTML += array;
}

// data di oggi
console.log(new Date());

// data specifica
// il mese parte da 0
console.log(new Date(2019, 11, 1, 17, 30, 59, 0));

// si può passare una data in millisecondi
console.log(new Date(1575734839551));

console.log(new Date("2019-12-01 17:30:59"));

var d = new Date();
console.log(d.toDateString());

//get
console.log(d.getFullYear());
// posizione mese partendo da 0
console.log(d.getMonth());
// numero gioro di oggi
console.log(d.getDate());
console.log(d.getHours());
console.log(d.getMinutes());
console.log(d.getSeconds());
console.log(d.getMilliseconds);

// ordine del giorno, partendo da domenica (giorno 0)
console.log(d.getDay());

//set
d.setMonth(13);
console.log(d);

//parse
console.log(Date.parse(d));


// format 
console.log(format(d));

function format(date) {
    var monthNames = undefined; // array nomi mesi
    var dayNames = undefined; // array nomi giorni

    return dayNames[date.getDay()].slice(0, 3) + " " +
        date.getDate() + " " + monthNames[date.getMonth()] + " " + 
        date.getFullYear(); 
}

// oggetti e classi 
var user = {
    username: "BlackPain",
    mail: "blackpain@gmail.com",
    age: 22,
    verified: true,
    getBirthDayYear: function() {
        return (new Date().getFullYear()) - this.age;
    }
};

// stessa cosa, ma la seconda ritorna undefined
console.log(user.username);
console.log(user["username"]);

user.years = 20;


// classe
var u = new User("BlackPain", "blackpain@gmail.com", 22, true);
console.log(u.getUsername());
console.log(u.getBirthDayYear());
u.setVerified(false);
console.log(u.isVerified());

// altri modi per set e get
console.log(u.mail);
u.mail = "black@gmail.com";
console.log(u.mail);


// extends
var a  = new Admin("Black", "giggino@gmail.com", "1234");
a.changePassword("3981");
console.log(a.mail);
console.log(a.getBirthDayYear());


class User{
    constructor(username, mail, years, verified){
        this._username = username;
        this._mail = mail;
        this._years = years;
        this._verified = verified;
    }

    isVerified(){
        return this._verified;
    }

    setVerified(verified){
        this._verified = verified;
    }

    getUsername(){
        return this._username;
    }

    getBirthDayYear(){
        return (new Date().getFullYear()) - this._years;
    }

    // altri modi per fare set e get
    set mail(mail){
        this._mail = mail;
    }

    get mail(){
        return this._mail;
    }

}

class Admin extends User {
    constructor(username, mail, passwd){
        super(username, mail, 19, true);
        this._passwd = passwd;
    }

    changePassword(newPassword){
        this._passwd = newPassword;
        console.log("Password cambiata! Per", super.mail);
    }
}


// let, const
// var non vede i blocchi 
var x = 0;
// il let vede il blocco
// errore se ci sono due variabili con lo stesso nome nello stesso blocco
let x = 1;

const P_GRECO = 3.14159265359;

// this rappresenta il contesto (blocco) in cui la nominiamo
// quindi può accedere a tutte le variabili e funzioni contenute
// in quel preciso contesto

function test(){
    var x = 2;
    console.log(x);
}

test();

function testLet(){
    let x = 2;
    console.log(x);
}

testLet();

console.log(P_GRECO);

// eccezioni
function tryCatch(){
    try {
        document.getElementById("test").style.color = "red";
    } catch (err){
        console.log(err.message);
    } finally {
        alert("finito!");
    }
}











