
const trEl=document.querySelectorAll('tr')

trEl.forEach((ele,i)=>{
  let firstValue="";
  let secondValue="";
  if(i>0){
  const inputEl=ele.querySelectorAll('input')


  //   inputElf.addEventListener('input',(e)=>{
  //   firstValue=e.target.value
  //    let eval=`${firstValue * secondValue}`
  //     inputEl[2].value=eval
  // })
  inputEl.forEach((innerEle,i)=>{
    innerEle.addEventListener('input',(e)=>{
      if(i==0){
        firstValue=e.target.value
      }
      else{
        secondValue=e.target.value
      }
      
      let eval=`${firstValue * secondValue}`
      inputEl[2].value=eval
    })
  })
  }



})

