

function get_data1(obj,arr){
  if ((obj && !obj.trim()) || obj === '') {
    location.reload();
    return
  }
  var paras = document.getElementsByClassName('page-btn');
  while(paras[0]) {
      paras[0].parentNode.removeChild(paras[0]);
  }
    var x =document.getElementById("laging");
    x.innerHTML = "";
    for (var i = 0; i < arr.length; i++){
      if (arr[i]['специальность'].indexOf(obj) > -1)
        {
          x.innerHTML += "<input type='radio' name='check_comp'>"+   arr[i]['компетенция']+ ": "+ 
          "<div id='raz'><span>подробнее</span>  <div>Студент должен знать <br><br><br><br> Студент долженть уметь<br><br><br><br> Студент владеть</div>  </div>" +
          "<br><br>" 
          ;
        }
    }

}


function get_data2(obj,arr){
  if ((obj && !obj.trim()) || obj === '') {
    location.reload();
    return
  }
  var paras = document.getElementsByClassName('page-btn');
  while(paras[0]) {
      paras[0].parentNode.removeChild(paras[0]);
  }
    var x =document.getElementById("laging");
    x.innerHTML = "";
    for (var i = 0; i < arr.length; i++){
      if (arr[i]['ключевые слова'].indexOf(obj) > -1)
        {
          x.innerHTML += "<input type='radio' name='check_comp'>"+   arr[i]['компетенция']+ ": " + 
          "<div id='raz'><span>подробнее</span>  <div>Студент должен знать <br><br><br><br> Студент долженть уметь<br><br><br><br> Студент владеть</div>  </div>" +
          "<br><br>" 
          ;
        }
    }

}



function show_students(arr){
  var x =document.getElementById("laging");
  for (var i = 0; i < arr.length; i++){
          if(arr[i]['admin'] != '1'){
          x.innerHTML +=  arr[i]['name']+ ": "+ arr[i]['id'] + 
          "<br><br>" ;
          }
    }
}

const tx = document.getElementsByTagName("textarea");
for (let i = 0; i < tx.length; i++) {
  tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
  tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
  this.style.height = 0;
  this.style.height = (this.scrollHeight) + "px";
}



function readLocal(){
  var form = document.querySelectorAll('.comp');

  for(i = 0; i < 2;i++){
      localStorage.setItem(form[i].name, form[i].value );
  }
}

function show_local(){
  var forms = document.querySelectorAll('.comp');
  for(i = 0; i < 2;i++){
    
      forms[i].value = localStorage.getItem(forms[i].name);
  }
  document.getElementById('part1').innerHTML="Приветствую, " + localStorage.getItem('Login');
  
}


