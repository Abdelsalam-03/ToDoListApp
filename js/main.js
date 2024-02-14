let items = document.querySelectorAll(".todo .body form");

items.forEach((form)=>{
    form.querySelector("input[type='checkbox']").addEventListener("change",()=>{
        form.querySelector("input[name='toggle']").value = "1";
        form.submit();
    })
    form.querySelector("button").addEventListener("click",()=>{
        form.querySelector("input[name='delete']").value = "1";
        form.submit();
    })
});