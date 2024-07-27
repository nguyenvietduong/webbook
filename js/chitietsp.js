function validateInput(inputElement) {
    var sl = parseInt(inputElement.value);
    if (sl < 1) {
      inputElement.value = 1;
    } else if(sl > 10){
      inputElement.value = 10;  
    }
  }
  