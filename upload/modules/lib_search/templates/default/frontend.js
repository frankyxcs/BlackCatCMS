function search_box_onfocus(input, search_string) {
  if (input.value == search_string){
    input.value='';
    input.className='search_box_input_active';
  } 
  else {
    input.select();
  }
}

function search_box_onblur(input, search_string) {
  if (input.value==''){ 
    input.value = search_string;
    input.className = 'search_box_input';
  }
}